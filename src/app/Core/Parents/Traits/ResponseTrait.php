<?php

namespace App\Core\Parents\Traits;

use App\Core\Parents\Transformers\Transformer;
use Spatie\Fractal\Fractal;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;
use Request;

trait ResponseTrait
{

    /**
     * @var  array
     */
    protected array $metaData = [];

    /**
     * @param       $data
     * @param null $transformerName The transformer (e.g., Transformer::class or new Transformer()) to be applied
     * @param array $includes additional resources to be included
     * @param array $meta additional meta information to be applied
     * @param null $resourceKey the resource key to be set for the TOP LEVEL resource
     *
     * @return array
     */
    public function transform(
        $data,
        $transformerName = null,
        array $includes = [],
        array $meta = [],
        $resourceKey = null
    ): array
    {
        // create instance of the transformer
        $transformer = new $transformerName;

        // if an instance of Transformer was passed
        if ($transformerName instanceof Transformer) {
            $transformer = $transformerName;
        }

        // append the includes from the transform() to the defaultIncludes
        $includes = array_unique(array_merge($transformer->getDefaultIncludes(), $includes));

        // set the relationships to be included
        $transformer->setDefaultIncludes($includes);

        // add specific meta information to the response message
        $this->metaData = [
            'include' => $transformer->getAvailableIncludes(),
            'custom'  => $meta,
        ];

        // no resource key was set
        if (!$resourceKey) {
            // get the resource key from the model
            $obj = null;
            if ($data instanceof AbstractPaginator) {
                $obj = $data->getCollection()->first();
            } elseif ($data instanceof Collection) {
                $obj = $data->first();
            } else {
                $obj = $data;
            }

            // if we have an object, try to get its resourceKey
            if ($obj && !is_array($obj)) {
                $resourceKey = method_exists($obj, 'getTable') ? $obj->getTable() : null;
            }
        }

        $fractal = Fractal::create($data, $transformer)->withResourceName($resourceKey)->addMeta($this->metaData);
        // check if the user wants to include additional relationships
        if ($requestIncludes = Request::get('include')) {
            $fractal->parseIncludes($requestIncludes);
        }

        // apply request filters if available in the request
        if ($requestFilters = Request::get('filter')) {
            $result = $this->filterResponse($fractal->toArray(), explode(';', $requestFilters));
        } else {
            $result = $fractal->toArray();
        }

        return $result;
    }


    /**
     * @param $data
     *
     * @return  $this
     */
    public function withMeta($data)
    {
        $this->metaData = $data;

        return $this;
    }

    /**
     * @param       $message
     * @param int $status
     * @param array $headers
     * @param int $options
     *
     * @return  JsonResponse
     */
    public function json($message, $status = 200, array $headers = [], $options = 0)
    {
        return new JsonResponse($message, $status, $headers, $options);
    }

    /**
     * @param null $message
     * @param int $status
     * @param array $headers
     * @param int $options
     *
     * @return JsonResponse
     */
    public function validation($message = null, $status = 422, array $headers = [], $options = 0)
    {
        return new JsonResponse($this->basePoint($message), $status, $headers, $options);
    }

    /**
     * @param null $message
     * @param int $status
     * @param array $headers
     * @param int $options
     *
     * @return JsonResponse
     */
    public function error($message = null, $status = 500, array $headers = [], $options = 0)
    {
        return new JsonResponse($this->basePoint($message), $status, $headers, $options);
    }

    /**
     * @param null $message
     * @param int $status
     * @param array $headers
     * @param int $options
     *
     * @return void
     */
    public function throwError($message = null, $status = 500, array $headers = [], $options = 0)
    {
        response()->json($this->basePoint($message), $status, $headers, $options)->throwResponse();
    }

    /**
     * @param null $message
     * @param int $status
     * @param array $headers
     * @param int $options
     *
     * @return JsonResponse
     */
    public function created($message = null, $status = 201, array $headers = [], $options = 0)
    {
        return new JsonResponse($this->basePoint($message), $status, $headers, $options);
    }

    /**
     * @param null  array or string $message
     * @param int $status
     * @param array $headers
     * @param int $options
     *
     * @return  JsonResponse
     */
    public function accepted($message = null, $status = 202, array $headers = [], $options = 0)
    {
        return new JsonResponse($this->basePoint($message), $status, $headers, $options);
    }

    /**
     * @param $responseArray
     *
     * @return  JsonResponse
     */
    public function deleted($responseArray = null)
    {
        if (empty($responseArray)) {
            return $this->notFoundContent();
        }

        return $this->accepted('Data Deleted Successfully.');
    }

    /**
     * @param int $status
     *
     * @return  JsonResponse
     */
    public function noContent($status = 204)
    {
        return new JsonResponse(null, $status);
    }

    /**
     * @return  JsonResponse
     */
    public function notFoundContent()
    {
        return new JsonResponse(['error' => 'Data is not found'], 404);
    }

    /**
     * @param array $responseArray
     * @param array $filters
     *
     * @return array
     */
    private function filterResponse(array $responseArray, array $filters)
    {
        foreach ($responseArray as $k => $v) {
            if (in_array($k, $filters, true)) {
                // we have found our element - so continue with the next one
                continue;
            }

            if (is_array($v)) {
                // it is an array - so go one step deeper
                $v = $this->filterResponse($v, $filters);
                if (empty($v)) {
                    // it is an empty array - delete the key as well
                    unset($responseArray[$k]);
                } else {
                    $responseArray[$k] = $v;
                }
                continue;
            } else {
                // check if the array is not in our filter-list
                if (!in_array($k, $filters)) {
                    unset($responseArray[$k]);
                    continue;
                }
            }
        }

        return $responseArray;
    }

    /**
     * @param $data
     * @return array
     */
    private function basePoint($data): array
    {
        return ['message' => $data];
    }

}

<?php

namespace App\Containers\Management\Data\Enums;

final class PermissionListEnum
{
    public const ORDERS = 'orders';
    public const STATISTIC = 'statistic';
    public const SERVICES = 'services';
    public const CLIENTS = 'clients';

    public const USERS_INDEX = 'users.index';
    public const USERS_CREATE = 'users.create';
    public const USERS_DELETE = 'users.delete';
    public const USERS_EDIT = 'users.edit';

    public const ROLES_INDEX = 'roles.index';
    public const ROLES_CREATE = 'roles.create';
    public const ROLES_DELETE = 'roles.delete';
    public const ROLES_EDIT = 'roles.edit';

    public const SERVICES_INDEX = 'services.index';
    public const SERVICES_CREATE = 'services.create';
    public const SERVICES_DELETE = 'services.delete';
    public const SERVICES_EDIT = 'services.edit';

    public const ORDERS_INDEX = 'orders.index';
    public const ORDERS_MY = 'orders.my';
    public const ORDERS_CREATE = 'orders.create';
    public const ORDERS_DELETE = 'orders.delete';
    public const ORDERS_EDIT = 'orders.edit';

    public const CLIENTS_INDEX = 'clients.index';
    public const CLIENTS_MY = 'clients.my';
    public const CLIENTS_CREATE = 'clients.create';
    public const CLIENTS_DELETE = 'clients.delete';
    public const CLIENTS_EDIT = 'clients.edit';

    public const ANOTHER_LIST_PERM = [
        self::STATISTIC
    ];

    public const USERS_LIST_PERM = [
        self::USERS_INDEX,
        self::USERS_CREATE,
        self::USERS_DELETE,
        self::USERS_EDIT,
    ];

    public const ROLES_LIST_PERM = [
        self::ROLES_INDEX,
        self::ROLES_CREATE,
        self::ROLES_DELETE,
        self::ROLES_EDIT,
    ];

    public const SERVICES_LIST_PERM = [
        self::SERVICES_INDEX,
        self::SERVICES_CREATE,
        self::SERVICES_DELETE,
        self::SERVICES_EDIT,
    ];

    public const ORDERS_LIST_PERM = [
        self::ORDERS,
        self::ORDERS_INDEX,
        self::ORDERS_MY,
        self::ORDERS_CREATE,
        self::ORDERS_DELETE,
        self::ORDERS_EDIT
    ];

    public const CLIENTS_LIST_PERM = [
        self::CLIENTS,
        self::CLIENTS_INDEX,
        self::CLIENTS_INDEX,
        self::CLIENTS_MY,
        self::CLIENTS_CREATE,
        self::CLIENTS_DELETE,
        self::CLIENTS_EDIT
    ];

    public const DESC_LIST_ALL_PERM = [
        self::STATISTIC       => 'Dashboard View',
        self::USERS_INDEX     => 'Users View',
        self::USERS_CREATE    => 'User Create',
        self::USERS_DELETE    => 'User Delete',
        self::USERS_EDIT      => 'User Edit',
        self::ROLES_INDEX     => 'Roles View',
        self::ROLES_CREATE    => 'Role Create',
        self::ROLES_DELETE    => 'Role Delete',
        self::ROLES_EDIT      => 'Role Edit',
        self::SERVICES_INDEX  => 'Services View',
        self::SERVICES_CREATE => 'Service Create',
        self::SERVICES_DELETE => 'Service Delete',
        self::SERVICES_EDIT   => 'Service Edit',
        self::ORDERS          => 'Orders',
        self::ORDERS_INDEX    => 'Orders View',
        self::ORDERS_MY       => 'Orders View My',
        self::ORDERS_CREATE   => 'Order Create',
        self::ORDERS_DELETE   => 'Order Delete',
        self::ORDERS_EDIT     => 'Order Edit',
        self::CLIENTS         => 'Clients',
        self::CLIENTS_INDEX   => 'Clients View',
        self::CLIENTS_MY      => 'Clients View My',
        self::CLIENTS_CREATE  => 'Client Create',
        self::CLIENTS_DELETE  => 'Client Delete',
        self::CLIENTS_EDIT    => 'Client Edit',
    ];
}

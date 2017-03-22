<?php
declare(strict_types=1);

namespace Backend\Api\Repository;

use Doctrine\DBAL\Connection;

class AuthSession
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function create(array $data)
    {
        $this->connection->insert('auth_session', $data);
    }
}

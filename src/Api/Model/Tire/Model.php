<?php
declare(strict_types=1);

namespace Api\Model\Tire;

use Api\Validator\Tire\Model as ModelValidator;
use Api\Repository\Tire\Model as ModelRepository;
use Api\Exception\ValidatorException;

/**
 * @Entity @Table(name="tire_model")
 **/
class Model
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @Column(type="string", length=100, unique=true, nullable=false)
     */
    private $name;

    private $validator;

    private $repository;
    
    public function __construct(ModelValidator $validator, ModelRepository $repository)
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    public function create(array $modelData): array
    {
        $this->validator->validate($modelData);

        $model = $modelData['name'];

        $existsName = $this->repository->findByName($model);

        if ($existsName) {
            $exception = new ValidatorException('This tire model name already exists.');
            throw $exception;
        }

        return $this->repository->create($modelData);
    }

    public function list(): array
    {
        return $this->repository->list();
    }
}

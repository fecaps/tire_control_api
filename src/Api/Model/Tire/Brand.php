<?php
declare(strict_types=1);

namespace Api\Model\Tire;

use Api\Validator\Tire\Brand as BrandValidator;
use Api\Repository\Tire\Brand as BrandRepository;
use Api\Exception\ValidatorException;
    
/**
 * @Entity @Table(name="tire_brand")
 **/
class Brand
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
    
    public function __construct(BrandValidator $validator, BrandRepository $repository)
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    public function create(array $brandData): array
    {
        $this->validator->validate($brandData);

        $brand = $brandData['name'];

        $existsName = $this->repository->findByName($brand);

        if ($existsName) {
            $exception = new ValidatorException('This tire brand name already exists.');
            throw $exception;
        }

        return $this->repository->create($brandData);
    }

    public function list(): array
    {
        return $this->repository->list();
    }
}

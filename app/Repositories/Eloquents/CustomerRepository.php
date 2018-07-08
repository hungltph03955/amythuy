<?php
/**
 */

namespace App\Repositories\Eloquents;
use App\Models\Admin\Customer;
use App\Repositories\CustomerRepositoryInterface;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    public function getBlankModel()
    {
        return new Customer();
    }

    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

    public function getSearch($s)
    {
        return Customer::search($s)
            ->paginate($this->p);
    }
}
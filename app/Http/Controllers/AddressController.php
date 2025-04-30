<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use Dotenv\Validator;
use Exception;
use Illuminate\Http\Request;
use App\repositories\interfaces\AddressRepositoryInterface;

class AddressController extends Controller
{
    private $AddressRepository;
    
    public function __construct(AddressRepositoryInterface $AddressRepository)
    {
    $this->AddressRepository=$AddressRepository;    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($data)
    {
      

            try{

            $address = new Address();
            $address->country =  $data['country'];
            $address->city = $data['city'];
            $address->region = $data['Region'];
            $address->streetAddress = $data['streetAddress'];
            $address->zipCode = $data['zipCode'];
            $this->AddressRepository->saveAddress($address);                 
            return $address;
            }catch(Exception $e){
                return back()->with('error',$e->getMessage());
        }
    }
    


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAddressRequest  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}

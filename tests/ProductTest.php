<?php

class ProductTest extends TestCase
{

    public function testGetProducts()
    {

        $this->get("products", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status',
            'message',
            'data' => [
                'data' => [
                    '*' => [
                        'id',
                        'product_name',
                        'product_description',
                        'created_at',
                        'updated_at'
                    ]
                ],
                'links' => [
                    '*' => [
                        'url',
                        'label',
                        'active'
                    ]
                ]
            ]


        ]);
    }

    public function testGetProductById()
    {
        $this->get("products/2", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status',
            'message',
            'data' => [
                'id',
                'product_name',
                'product_description',
                'created_at',
                'updated_at'
            ]

        ]);
    }

    public function testGetProductByIdNotFound()
    {
        $this->get("products/45", []);
        $this->seeStatusCode(404);
        $this->seeJsonStructure([
            'status',
            'message',
            'data' => []

        ]);
    }

    public function testPostProduct()
    {

        $parameters = [
            'name' => 'cellphone last',
            'description' => 'iphone 13',
        ];

        $this->post("products", $parameters, []);
        $this->seeStatusCode(201);
        $this->seeJsonStructure([
            'status',
            'message',
            'data' => [
                'id',
                'product_name',
                'product_description',
                'created_at',
                'updated_at'
            ]

        ]);
    }

    public function testUpdateProduct()
    {

        $parameters = [
            'name' => 'cellphone iphone',
            'description' => 'iphone 13',
        ];

        $this->put("products/10", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status',
            'message',
            'data' => [
                'id',
                'product_name',
                'product_description',
                'created_at',
                'updated_at'
            ]
        ]);
    }

    public function testUpdateProductNotFound()
    {

        $parameters = [
            'name' => 'cellphone iphone',
            'description' => 'iphone 13',
        ];

        $this->put("products/4", $parameters, []);
        $this->seeStatusCode(404);
        $this->seeJsonStructure([
            'status',
            'message',
            'data' => []
        ]);
    }

    public function testDeleteProduct()
    {

        $this->delete("products/10", [], []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status',
            'message',
            'data'
        ]);
    }

    public function testDeleteProductNotFound()
    {

        $this->delete("products/3", [], []);
        $this->seeStatusCode(404);
        $this->seeJsonStructure([
            'status',
            'message',
            'data'
        ]);
    }
}

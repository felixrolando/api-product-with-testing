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
        $this->get("products/4", []);
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

    public function testPostProduct()
    {

        $parameters = [
            'name' => 'cellphone',
            'description' => 'iphone 13',
        ];

        $this->post("products", $parameters, []);
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

    public function testUpdateProduct()
    {

        $parameters = [
            'name' => 'cellphone iphone',
            'description' => 'iphone 13',
        ];

        $this->put("products/4", $parameters, []);
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

    public function testDeleteProduct()
    {

        $this->delete("products/5", [], []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status',
            'message',
            'data'
        ]);
    }
}

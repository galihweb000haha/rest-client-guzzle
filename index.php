<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

function getAllItems(){
    $client = new Client();
    
    $response = $client->get('https://localhost/restapi',
        ['verify' => false]
    );
    echo $response->getStatusCode();
    echo $response->getReasonPhrase();
    echo $response->getBody()->getContents();
}
function getItem($id){
    $client = new Client();        

    $response = $client->get('https://localhost/restapi',
        [
            'verify' => false,
            'query' => [
                'id' => $id
            ]
        ]
    );

    echo $response->getStatusCode();
    echo $response->getReasonPhrase();
    echo $response->getBody()->getContents();
}
function insertItem($data){
    $client = new Client();    
    
    $response = $client->post('https://localhost/restapi/items',
        [
            'verify' => false,
            'form_params' => [
                'nama' => $data['nama'],
                'kategori' => $data['kategori'],
                'brand' => $data['brand'],
                'harga' => $data['harga'],
                'gambar' => $data['gambar'],
                'deskripsi' => $data['deskripsi']
            ]
        ]
    );


    echo $response->getStatusCode();
    echo $response->getReasonPhrase();    
    echo $response->getBody()->getContents();
}
function updateItem($data){
    $client = new Client();    
    
    $response = $client->put('https://localhost/restapi/items',
        [
            'verify' => false,
            'form_params' => [
                'id' => $data['id'],
                'nama' => $data['nama'],
                'kategori' => $data['kategori'],
                'brand' => $data['brand'],
                'harga' => $data['harga'],
                'gambar' => $data['gambar'],
                'deskripsi' => $data['deskripsi']
            ]
        ]
    );


    echo $response->getStatusCode();
    echo $response->getReasonPhrase();    
    echo $response->getBody()->getContents();
}
function deleteItem($id){
    $client = new Client();
    
    $response = $client->request('DELETE', 'https://localhost/restapi/items',
        [
            'verify' => false,
            'form_params' => [
                'id' => $id
            ]
        ]
    );         
    
    echo $response->getBody()->getContents();
}
if(isset($_POST['getAll'])) {
    getAllItems();
}
if(isset($_POST['getOne'])) {
    getItem($_POST['id']);
}
if(isset($_POST['insertItem'])) { 
    insertItem($_POST);
}
if(isset($_POST['updateItem'])) { 
    updateItem($_POST);
}
if(isset($_POST['deleteItem'])){    
    deleteItem($_POST['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <ul>
        <li>
            <label for="">ID :</label>
            <input type="text" name="id">
        </li>
        <li>
            <label for="">Nama : </label>
            <input type="text" name="nama">        
        </li>
        <li>
            <label for="">Kategori : </label>
            <input type="text" name="kategori">        
        </li>
        <li>
            <label for="">Brand : </label>
            <input type="text" name="brand">        
        </li>
        <li>
            <label for="">Harga : </label>
            <input type="text" name="harga">        
        </li>
        <li>
            <label for="">Gambar : </label>
            <input type="text" name="gambar">            
        </li>
        <li>
            <label for="">Deskripsi : </label>
            <input type="text" name="deskripsi">        
        </li>
        <li>            
            <input type="submit" name="getAll" value="getAll">
            <input type="submit" name="getOne" value="getOne">            
            <input type="submit" name="insertItem" value="insertItem">            
            <input type="submit" name="updateItem" value="updateItem">            
            <input type="submit" name="deleteItem" value="deleteItem">            
        </li>
    </ul>
    </form>

</body>
</html>
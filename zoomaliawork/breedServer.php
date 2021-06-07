<?php

    require_once("nusoap/lib/nusoap.php");    
    
    function getDetails($name)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "Zoomalia";

        $connection = new mysqli($servername, $username, $password, $database);

        if(!$connection)
        {
            die();
        }

        $sql = "SELECT * FROM catBreed WHERE Name LIKE '$name';";
        $query = mysqli_query($connection, $sql);

        if(mysqli_num_rows($query) > 0)
        {
            while($row = mysqli_fetch_array($query))
            {
                $breed = array('BreedId'=>$row['BreedId'], 'Name' => $row['Name'], 'Description' => $row['Description'], 'Image' => $row['Image']);
			     $breedArray[] = $breed;

            }
        }
        else
        {
            $breed = array('BreedId'=>"NULL", 'Name' => "NULL", 'Description' => "NULL", 'Image' =>"NULL");
            $breedArray[] = $breed;
        }

        return $breedArray;
    }

    $server = new soap_server();
    $NAMESPACE = 'http://codex-enterprise.com/getCat';
    $server->debug_flag=false;
    $server->configureWSDL('Cat', $NAMESPACE);
    $server->wsdl->schemaTargetNamespace = $NAMESPACE;

    // ----relative WSDL Declaration-----
    $server->wsdl->addComplexType(
        'breed',
        'complexType',
        'struct',
        'sequence',
        '',
        array(
            'BreedId' => array('name'=>'BreedId','type'=>'xsd:string'),
            'Name' => array('name'=>'Name','type'=>'xsd:string'),
            'Description' => array('name'=>'Description','type'=>'xsd:string'),
            'Image' => array('name'=>'Image','type'=>'xsd:string')
        )
    );

    // ----relative Array[] WSDL Declaration----

    $server->wsdl->addComplexType(
        'breedArray',
        'complexType',
        'array',
        '',
        'SOAP-ENC:Array',
        array(),
        array(
            array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:breed[]')
        ),
        'tns:breed'
    );

    $server->register('getDetails',
    array('input' => 'xsd:string'),
    array('output' => 'tns:breedArray'),
    $NAMESPACE);

    $server->service(file_get_contents("php://input"));


?>
<?php
class product{
    private $idproduct;
    private $name;
    private $price;
    private $quantity;
    private $description;
    private $image;
    private $idcategory;
    private $isdeleted;
    //=======================================================================================================
    function __get($attr){
        return $this->$attr;
    }
    function __set($attr,$value){
        $this->$attr = $value; //variable variable
    }
    static function createobj($name,$price,$quantity,$description,$image,$idcategory){
        $obj=new self();
        $obj->idproduct=null;
        $obj->name=$name;
        $obj->price=$price;
        $obj->quantity=$quantity;
        $obj->description=$description;
        $obj->image=$image;
        $obj->idcategory=$idcategory;
        $obj->isdeleted=0;
        return $obj;
    }
    static function selectAll() {
        require 'config.php';
        $stmt = $mysqli->prepare("SELECT * FROM `E-Commerce`.product WHERE isdeleted = 0");
        $stmt->execute();
        $result = $stmt->get_result();
        while($obj = $result->fetch_object('product')) {
            $products[]=$obj;
        }
        return $products;
    }
    static function selectbyname($name) {
        require 'config.php';
        $stmt = $mysqli->prepare("SELECT * FROM `E-Commerce`.product
            WHERE `name` = ? AND isdeleted = 0");
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_object('product');
    }
    static function selectbyid($idproduct) {
        require 'config.php';
        $stmt = $mysqli->prepare("SELECT * FROM `E-Commerce`.product
            WHERE `idproduct` = ? AND isdeleted = 0");
        $stmt->bind_param('i', $idproduct);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_object('product');
    }
    static public function imageUpHandle(){
        if ($_FILES['image']['error']>0) {
            echo "problem";
            switch ($_FILES['image']['error']) {
                case 1: echo "File exceeded upload_max_filesize";
                break;
                case 2: echo "File exceeded max_file_size";
                break;
                case 3: echo "File only partially uploaded";
                break;
                case 4: echo "No file uploaded";
                break;
                case 6: echo "Cannot upload file: No temp directory specified";
                break;
                case 7: echo "Upload failed: Cannot write to disk";
                break;
            }
            exit;
        }
        // Does the file have the right MIME type?
        if ($_FILES["image"]["type"] != "image/jpeg" && $_FILES["image"]["type"] != "image/x-png")
        {
            echo "Problem: file is not of the specified type";
            exit;
        }
        // put the file where we"d like it
        $upfileDir = "./img/products/".$_FILES["image"]["name"] ;
        if (is_uploaded_file($_FILES["image"]["tmp_name"]))
        {
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $upfileDir))
            {
                echo "Problem: Could not move file to destination directory";
                exit;
            }
        }
        else
        {
            echo "Problem: Possible file upload attack. Filename: ";
            echo $_FILES["image"]["name"];
            exit;
        }
        echo "File uploaded successfully<br><br>";
    }
    function insert() {
        require 'config.php';
        $stmt = $mysqli->prepare("INSERT INTO `E-Commerce`.`product`
        VALUES(null,?,?,?,?,?,?,?)");
        $stmt->bind_param('sdissii',$this->name,$this->price,$this->quantity,
        $this->description,$this->image,$this->idcategory,$this->isdeleted);
        return $stmt->execute();
    }
    function update() {
        require 'config.php';
        $stmt = $mysqli->prepare("UPDATE `E-Commerce`.`product`
            SET
            `name` = ?,
            `price` = ?,
            `quantity` = ?,
            `description` = ?,
            `image` = ?,
            `idcategory` = ?,
            `isdeleted` = ?
            WHERE `idproduct` = $this->idproduct
            ");
        $stmt->bind_param('sdissii',$this->name,$this->price,$this->quantity,
        $this->description,$this->image,$this->idcategory,$this->isdeleted);
        return $stmt->execute();
    }
}?>

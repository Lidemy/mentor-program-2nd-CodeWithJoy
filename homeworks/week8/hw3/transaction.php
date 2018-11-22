<?
require_once('conn.php');


$is_success = true;
$conn->autocommit(FALSE);
$conn->begin_transaction();

$stmt1 = $conn->prepare("SELECT * FROM `joy_transaction` WHERE products = '商品一' for update" );
$stmt1->execute();
$result1 = $stmt1->get_result();

if($result1->num_rows > 0){
    $row1 = $result1->fetch_assoc();
    echo $row1["products"].":".$row1["amount"];
    
    if($row1["amount"] > 0){ 
        $stmt1_1 = $conn->prepare("UPDATE `joy_transaction` SET amount = amount-1  WHERE products = '商品一' ");
        if ($stmt1_1->execute()){
        echo "購買成功";
        }else{
        }
    }else{
        $is_success = false;
    }
}
echo "<br>";

$stmt2 = $conn->prepare("SELECT * FROM `joy_transaction` WHERE products = '商品二' for update" );
$stmt2->execute();
$result2 = $stmt2->get_result();

if($result2->num_rows > 0){
    $row2 = $result2->fetch_assoc();
    echo $row2["products"].":".$row2["amount"];

    if($row2["amount"] > 0){ 
        $stmt2_1 = $conn->prepare("UPDATE `joy_transaction` SET amount = amount-1  WHERE products = '商品二' ");
        if ($stmt2_1->execute()){
            echo "購買成功";
        }else{
            echo "購買失敗";
        }
    }else{
        $is_success = false;
    }
}

echo "<br>";

$stmt3 = $conn->prepare("SELECT * FROM `joy_transaction` WHERE products = '商品三' for update" );
$stmt3->execute();
$result3 = $stmt3->get_result();


if($result3->num_rows > 0){
    $row3 = $result3->fetch_assoc();
    echo $row3["products"].":".$row3["amount"];

    if($row3["amount"] > 0){ 
        $stmt3_1 = $conn->prepare("UPDATE `joy_transaction` SET amount = amount-1  WHERE products = '商品三' ");
        if ($stmt3_1->execute()){
            echo "購買成功";
        }
    }else{
        $is_success = false;
    }
}
echo "<br>";
 
if( $is_success === false){
    $conn->rollback();
    echo "交易失敗";

}else{
    $conn->commit();//把交易關起來，整個過程在刷新以後才會再跑一次
    echo "交易完成";
}

?>
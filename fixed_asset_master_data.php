<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');

function generateId($id, $ref, $switch) {

    if ($switch == "pre") {
        $temp = substr($id, strlen($ref));
        $id = (int) $temp;

        return $id;
    } else if ($switch == "post") {

        $temp = substr("0000000" . $id, -7);
        $id = $ref . $temp;

        return $id;
    }
}

if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT fxacode FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    //$no = $row['fxacode'];
    $post = generateId($row['fxacode'], "FA/", "post");
    $uniq = uniqid();
    
    $ResponseXML .= "<id><![CDATA[$post]]></id>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "delete from fixedasset where asssetcode = '" . $_GET['assetcode'] . "'";
        $result = $conn->query($sql);
        $sql = "Insert into fixedasset(asssetcode,assetname,assetctgory,remark,uniq)values 
           ('" . $_GET['assetcode'] . "','" . $_GET['assetname_txt'] . "','" . $_GET['assetcatgry_txt'] . "','" . $_GET['remk_txt'] . "','" . $_GET['uniq'] . "')";

        $result = $conn->query($sql);
        $sql = "SELECT fxacode FROM invpara";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no = $row['fxacode'];
        $no2 = $no + 1;
        $sql = "update invpara set fxacode = $no2 where fxacode = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "update") {
    try {
        $sql = "update grndetails set grndate = '" . $_GET['date_txt'] . "',manualrefno = '" . $_GET['manualrefno_txt'] . "',purchasingorderno = '" . $_GET['pono_txt'] . "',currencycode = '" . $_GET['currencycode_txt'] . "',exchange = '" . $_GET['exchange_txt'] . "',suppliercode = '" . $_GET['suppliercodeno_txt'] . "',costcenter = '" . $_GET['costcenter_txt'] . "',remarks = '" . $_GET['remarks_txt'] . "',textcombination = '" . $_GET['tcomb_txt'] . "'  where referenceno = '" . $_GET['reference_no_Text'] . "'";
        $result = $conn->query($sql);
        echo "update";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}



if ($_GET["Command"] == "delete") {

    $sql = "update grndetails set cancel = '1'   where referenceno = '" . $_GET['reference_no_Text'] . "'";
    $result = $conn->query($sql);


    echo "deleted";
}



?>
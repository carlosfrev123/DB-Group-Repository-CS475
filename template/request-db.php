<?php
function addRequests($reqDate, $roomNumber, $reqBy, $repairDesc, $reqPriority)
{
    global $db;
    //$reqDate = date('Y-m-d');

    //$query = "INSERT INTO requests (reqDate, roomNumber, reqBy, repairDesc, reqPriority) VALUES ('2024-03-18', 'ABC', 'Someone', 'fix light', 'low')";
    $query = "INSERT INTO requests (reqDate, roomNumber, reqBy, repairDesc, reqPriority) VALUES (:reqDate, :roomNumber, :reqBy, :repairDesc, :reqPriority)";
    
    try{  
        //$statement = $db->query($query);

        // prepared statement
        // pre-compile
        $statement = $db->prepare($query);

        //fill in the value
        $statement->bindValue(':reqDate', $reqDate);
        $statement->bindValue(':roomNumber', $roomNumber);
        $statement->bindValue(':reqBy', $reqBy);
        $statement->bindValue(':repairDesc', $repairDesc);
        $statement->bindValue(':reqPriority', $reqPriority);

        // execute
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e)
    {
        $e->getMessage();
    } catch (Exception $e)
    {
        $e->getMessage();
    }
}

function getAllRequests()
{
    // global $db;
    // $query = "SELECT * FROM requests";
    // $statement = $db->prepare($query);
    // $statement->execute();
    // $result = $statement->fetchAll(); //fetch all rows that we get as result fetch() for only first row
    // $statement->closeCursor();

    // return $result;
}

function getRequestById($id)  
{
    global $db;
    $query = "SELECT * FROM requests WHERE reqId=:reqId";
    $statement = $db->prepare($query);
    $statement->bindValue(':reqId', $id);
    $statement->execute();
    $result = $statement->fetch(); 
    $statement->closeCursor();

    return $result;
}

function updateRequest($reqId, $reqDate, $roomNumber, $reqBy, $repairDesc, $reqPriority)
{
    global $db;
    $query = "UPDATE requests SET reqDate=:reqDate, roomNumber=:roomNumber, reqBy=:reqBy, repairDesc=:repairDesc, reqPriority=:reqPriority WHERE reqId=:reqId";

    $statement = $db->prepare($query);

    // fill in the value
    $statement->bindValue(':reqId', $reqId);
    $statement->bindValue(':reqDate', $reqDate);
    $statement->bindValue(':roomNumber', $roomNumber);
    $statement->bindValue(':reqBy', $reqBy);
    $statement->bindValue(':repairDesc', $repairDesc);
    $statement->bindValue(':reqPriority', $reqPriority);

    // execute
    $statement->execute();
    $statement->closeCursor();

}

function deleteRequest($reqId)
{
    global $db;
    $query = "DELETE FROM requests WHERE reqID=:reqID" ;

    $statement = $db->prepare($query);
    $statement->bindValue(':reqID', $reqId);
    $statement->execute();
    $statement->closeCursor();
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inventory input</title>
        
    <body>
        
        <div class="container">
        <h1>INSERTS DATA INTO THE DATABASE</h1>
    <form action="inventory.php" method="POST">
    
            <label for="dname">DrugName:</label><br>
            <input type="text" id="dname" name="dname" size="40" required autofocus autocomplete="on" class="data_insert"><br><br>
    
       
            <label for="dssn">DrugSSN:</label><br>
            <input type="text" id="dssn" name="dssn" size="40" required autofocus autocomplete="on"  class="data_insert"><br><br>
    
        
                <label for="quan" class="form-label">Quantity:</label><br>
                <input type="text" id="quan" name="quan" required autofocus autocomplete="on"  class="data_insert"><br><br>
            
           
                <label for="Pharm" class="form-label">PharmaceuticalCompany:</label><br>
                <textarea name="Pharm" rows="5" cols="30" required  class="data_insert"></textarea><br><br>

                <label for="price">Price:</label><br>
            <input type="text" id="price" name="price" size="40" required autofocus autocomplete="on"  class="data_insert"><br><br>
    


            <input type="submit" value="Save in system" formaction="inventoryinsert.php" class="sub_btn">
            <input type="reset">
        </div>
    </form>

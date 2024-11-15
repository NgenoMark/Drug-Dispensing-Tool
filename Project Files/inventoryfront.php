<!DOCTYPE html>
<html>
    <head>
        <title>Inventory input</title>
       
    <body>
        <Link rel="stylesheet" href="stylef.css">
        <div class="container">
        <h1>INSERTS DATA INTO THE DATABASE</h1>
    <form action="inventory.php" method="POST" enctype="multipart/form-data" >



    <div class="custom-dropdown">
        <div class="dropdown-content">
            <label for="cat">Category</label>
            <select id="cat" name="cat">
                <option value="Analgesics">Analgesics</option>
                <option value="Antibiotics">Antibiotics</option>
                <option value="Antivirals">Antivirals</option>
                <option value="Antifungals">Antifungals</option>
                <option value="Antidepressants">Antidepressants</option>
                <option value="Antihistamines">Antihistamines</option>
            </select>
            <button id="description-button" class="description-button">Description</button>
            <div class="description" id="description-text"></div>
        </div>
    </div>
    <script src="stylein.js"></script><br><br>


            <label for="dname">DrugName:</label><br>
            <input type="text" id="dname" name="dname" size="40" required autofocus autocomplete="on" class="data_insert"><br><br>
    
       
            <label for="dssn">DrugSSN:</label><br>
            <input type="text" id="dssn" name="dssn" size="40" required autofocus autocomplete="on"  class="data_insert"><br><br>
    
        
                <label for="quan" class="form-label">Quantity:</label><br>
                <input type="text" id="quan" name="quan" required autofocus autocomplete="on"  class="data_insert"><br><br>


                <label for="des" class="form-label">Details:</label><br>
                <textarea name="des" rows="6" cols="30" required  class="data_insert">
Drug Classification:
Indications:
Side effects:
Active ingredient:
                </textarea><br><br>
            
           
                <label for="Pharm" class="form-label">PharmaceuticalCompany:</label><br>
                <textarea name="Pharm" rows="4" cols="30" required  class="data_insert"></textarea><br><br>
                <label for="price">Price:</label><br>

            <input type="text" id="price" name="price" size="40" required autofocus autocomplete="on"  class="data_insert" value="Price per capsule"><br><br>

            <label for="image">ImagePath:</label><br>
    <input type="file" id="image" name="image" accept="image/*" class="data_insert"><br><br>
       
    
            <input type="submit" value="Save in system" formaction="inventoryinsert.php" class="sub_btn">
            <input type="reset">

            <button onclick = "redirectToAllDrugs()"> View  full inventory</button>
            <script>
                function redirectToAllDrugs(){
                    window.location.href  = "inventorydisplay.php"
                }
            </script>
        </div>
    </form>
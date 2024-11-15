const express = require ('express');
const mysql = require ('mysql');
const cors = require('cors');
const bodyParser = require ('body-parser');
const app = express();
const PORT = 3000;


app.use(cors());
app.use(bodyParser.json());
//app.use(express.static(--dirname + '/welcomepage.php' ))

const connection = mysql.createConnection({
    host:'localhost',
    password:'',
    user:'root',
    database:'drug_dispensing_tool'
});

connection.connect((err) => {
    if(err){
        console.error("Error connecting to the database " + err.stack);
        return;
    }
    console.log("Connection to the database succesful " + connection.threadId);
});



app.post('/drugs' , (req,res) => {
    const {acronym} = req.body;
    connection.query('INSERT into inventory (name) Values (?)' , [name] , (error, results) =>{ 
        if(error) throw error;
        res.json({id :results.insertId, name :acronym});
        
    });
});

app.get('/drugs', (req,res) =>{
    connection.query('SELECT * FROM inventory' , (error,results) =>{
        if(error) throw error;
        res.json(results);
    });
});

app.listen(PORT, () =>{
    console.log(`Server is running on port ${PORT}`);
});
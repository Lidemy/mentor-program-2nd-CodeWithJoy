const express = require('express');
const app = express();

app.get('/',(req,res) => {
    res.send("yoyoyo")
})
app.get('/test', (req, res) => {
    res.send("hell")
})

app.listen(3000, ()=>{
    console.log("Example app listening on port 3000.")
})
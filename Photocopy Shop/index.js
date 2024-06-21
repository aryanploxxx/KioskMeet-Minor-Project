const express = require('express');
const path = require('path');
const app = express();
const port = 8080;

app.set('view engine', 'ejs');
app.use(express.urlencoded({extended: true}));
app.use(express.json());
app.use(express.static(path.join(__dirname, 'public')));
app.set("views", path.resolve("./views"))


app.get('/', (req, res) => {
    res.render('sendEmail')
})

app.listen(port, ()=> {
    console.log(`Server is running on port: ${port}`);
})
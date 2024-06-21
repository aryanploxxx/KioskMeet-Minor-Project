const express = require('express')
const mongoose = require('mongoose')
const path = require('path')
const app = express()
const nodemailer = require('nodemailer')
// require('dotenv').config()
const port = 9000;
// const router = express.Router()
// const cookieParser = require('cookie-parser')
// const {restrictToLoggedInUserOnly} = require('./middlewares/auth')

// const methodOverride = require('method-override');
// app.use(methodOverride('_method'));

// const nodemailer = require("nodemailer");
const smtpTransport = require("nodemailer-smtp-transport");

app.set("view engine", "ejs")
app.set("views", path.resolve("./views"))
app.use(express.static(path.join(__dirname, 'public')));

app.use(express.json());
app.use(express.urlencoded({extended: true}));
// app.use(cookieParser())

mongoose.connect('mongodb://127.0.0.1:27017/laundry-admin')
    .then(()=>{ console.log("Database Connected.") })
    .catch((err)=>{ console.log(`Error Message: ${err}`)})

const User = require('./model/user')

app.get('/', (req, res) => {
    res.render('index')
})


// Only use this to demonstate creation of project
app.get('/create', (req, res) => {
    res.render('create')
})
app.post('/create', async (req, res) => {
    const name = req.body.namee;
    const email = req.body.email;
    const pass = req.body.password;
    await User.create({ name: name, email: email, password: pass});
    const users = await User.find({});
    console.log(newList)
    return res.render("index")
})


// app.post('/validate', async (req, res) => {
//     // check user name and password for laundry-admin
//     const enteredEmail = req.body.email;
//     const enteredPass = req.body.password;
//     const user = await User.find({email: enteredEmail});
//     console.log(enteredEmail)
//     console.log(user.email)
//     if(enteredEmail !=  user.email) {
//         res.render('index')
//     }
//     res.render('send-update')
// })

let email = undefined;
let password = undefined

app.post('/send-update', (req, res) => {
    // render send email page here
    email = req.body.email
    password = req.body.password
    res.render('send-update')
})

app.get('/send-update', (req, res) => {
    // render send email page here
    res.render('send-update')
})

app.post('/send-mail', (req,res) => {
    const recievermail = req.body.mail;
    const subject = req.body.subject;
    const body = req.body.body;

    // const auth = nodemailer.createTransport({
    //     service: "gmail",
    //     secure : true,
    //     port : 465,
    //     auth: {
    //         user: "laundryjiit@gmail.com",
    //         pass: "faua lhnt nmfd xutc"

    //     }
    // });

    // const receiver = {
    //     from : `${email}`,
    //     to : `${recievermail}`,
    //     subject : `${subject}`,
    //     text : `${body}`,
    // };

    // auth.sendMail(receiver, (error, emailResponse) => {
    //     if(error)
    //     throw error;
    //     console.log(`success! ${emailResponse}`);
    //     res.render('index')
    // });


    var transporter = nodemailer.createTransport(
        smtpTransport({
            service: "gmail",
            host: "smtp.gmail.com",
            port: 587,
            secure: false,
            auth: {
            user: "laundryjiit@gmail.com",
            pass: "faua lhnt nmfd xutc",
            },
        })
    );

    let mailOptions = {
        from : "laundryjiit@gmail.com",
        to : `${recievermail}`,
        subject : `${subject}`,
        text : `${body}`,
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            return console.log(error.message);
        }
        console.log("Email Sent Successfully");
        res.render('success')
    });

})

app.listen(port, ()=> {
    console.log(`Server is running on port: ${port}`);
})
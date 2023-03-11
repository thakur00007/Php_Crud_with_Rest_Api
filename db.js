const mysql = require('mysql');
const env = require('./env');
const db = mysql.createConnection({
    host: env.host,
    user: env.user,
    password: env.pass,
    database: env.db
});

db.connect((err)=>{
    if(err){
        console.log(err)
    }
    console.log("Connected to database")
})

module.exports = db;

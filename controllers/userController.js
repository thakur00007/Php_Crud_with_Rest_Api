const db = require('../db');
const User = require('../model/userModel');

// get user
exports.getUsers = (req, res)=>{
    let user = new User();
    db.query(user.getUsers('user'), (err, result)=>{
        if(err){
            res.status(400).json({
                status: "fail",
                data: err.message
            })
        }
        else if(result.length == 0){
            res.status(200).json({
                status: "success",
                message: "No user found",
                data: null
            })
        }
        else{
            res.status(200).json({
                status: "success",
                message: "Users found",
                data: result
            })
        }
    })
}


const db = require('../db');
const User = require('../model/userModel');

// get user
exports.getUsers = (req, res)=>{
    let user = new User();
    db.query(user.getUsers('user'), (err, result)=>{
        if(err){
            res.status(200).json({
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

// get user by id
exports.getUserById = (req, res)=>{
    let id = req.params.id;
    let user = new User();
    if(!id){
        res.status(200).json({
            status: "fail",
            message: "Id is empty",
            data: null
        })
    }else if(isNaN(id)){
        res.status(200).json({
            status: "fail",
            message: "Id is not a number",
            data: null
        })
    }else{
        db.query(user.getUserById('user', id), (err, result)=>{
            if(err){
                res.status(200).json({
                    status: "fail",
                    message: err.message,
                    data: null
                })
            }
            else if(result.length == 0){
                res.status(200).json({
                    status: "fail",
                    message: "user not found",
                    data: null
                })
            }
            else{
                res.status(200).json({
                    status: "success",
                    message: "User found",
                    data: result
                })
            }
        })
    }
}

// create user
exports.createUser = (req, res)=>{
    let obj = {
        name: req.body.name,
        email: req.body.email,
        phone: req.body.phone
    }
    if(!obj.name || !obj.email || !obj.phone){
        res.status(200).json({
            status: "fail",
            message: "One or more fields are empty",
            data: null
        })
    }else if(isNaN(obj.phone)){
        res.status(200).json({
            status: "fail",
            message: "Phone is not a number",
            data: null
        })
    }else{

        let user = new User();
        db.query(user.createUser('user', obj), (err, result)=>{
            if(err){
                
                res.status(200).json({
                    status: "fail",
                    message: err.message,
                    data: null
                })

            }else{
                res.status(200).json({
                    status: "success",
                    message: "User created successfully",
                    data: obj
                })
            }
        })
    }
}

// delete user by id
exports.deleteUserById = (req, res)=> {
    let id = req.params.id;
    let user = new User();
    // if user not found on database by this id
    if(!id){
        res.status(200).json({
            status: "fail",
            message: "Id is empty",
            data: null
        })
    }else if(isNaN(id)){
        res.status(200).json({
            status: "fail",
            message: "Id is not a number",
            data: null
        })
    }else{
        db.query(user.getUserById('user', id), (err, result)=>{
            if(result.length == 0){
                res.status(200).json({
                    status: "fail",
                    message: "user not found",
                    data: null
                })
            }
            else{
                db.query(user.deleteUserById('user', id), (err, result)=>{
                    if(err){
                        res.status(200).json({
                            status: "fail",
                            message: err.message,
                            data: null
                        })
                    }
                    else{
                        res.status(200).json({
                            status: "success",
                            message: "User deleted successfully",
                            data: null
                        })
                    }
                })
            }
        })
    }
}

// update user by id
exports.updateUserById = (req, res)=>{
    let id = req.params.id;
    let user = new User();
    let obj = {
        name: req.body.name,
        email: req.body.email,
        phone: req.body.phone
    }    
    if(!id){
        res.status(200).json({
            status: "fail",
            message: "Id is empty",
            data: null
        })
    }else if(isNaN(id)){
        res.status(200).json({
            status: "fail",
            message: "Id is not a number",
            data: null
        })
    }else if(isNaN(obj.phone)){
        res.status(200).json({
            status: "fail",
            message: "Phone is not a number",
            data: null
        })
    }else{
        db.query(user.updateUserById('user', id, obj), (err, result)=>{

            if(err){
                res.status(200).json({
                    status: "fail",
                    message: err.message,
                    data: null
                })
            }else{
                res.status(200).json({
                    status: "success",
                    message: "User updated successfully",
                    data: obj
                })
            }
        })
    }
}


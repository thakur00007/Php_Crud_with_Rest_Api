const express = require('express');

const router = express.Router();

const userController = require('../controllers/userController');

// get user
router.get('/', userController.getUsers)

// get user by id
router.get('/:id', userController.getUserById)

module.exports = router;
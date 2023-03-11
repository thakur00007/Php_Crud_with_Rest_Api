
class User {
    constructor(){}

    // get user
    getUsers(table){
        let sql = `SELECT * FROM ${table}`;
        return sql;

    }
    
    // get user by id
    getUserById(table, id){
        let sql = `SELECT * FROM ${table} WHERE id = ${id}`;
        return sql;
    }

     // create user
     createUser(table, obj){
        let sql = `INSERT INTO ${table} (name, email, phone) values ('${obj.name}', '${obj.email}', ${obj.phone})`;
        return sql;
    }

    // delete user by id
    deleteUserById(table, id){
        let sql = `DELETE FROM ${table} WHERE id = ${id}`;
        return sql;
    }

    // update user by id
    updateUserById(table, id, obj){
        let sql = `UPDATE ${table} SET name = '${obj.name}', email = '${obj.email}', phone = ${obj.phone} WHERE id = ${id}`;
        return sql;
    }

}

module.exports = User;
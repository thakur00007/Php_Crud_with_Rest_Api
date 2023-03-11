
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

}

module.exports = User;
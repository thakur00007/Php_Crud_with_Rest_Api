
class User {
    constructor(){}

    // get user
    getUsers(table){
        let sql = `SELECT * FROM ${table}`;
        return sql;

    }    

}

module.exports = User;
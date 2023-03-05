const express = require('express')
const cors = require('cors')
const {Sequelize, DataTypes } = require('sequelize') 
//const user = require('./user.json')
//const ingredients = require('./ingredients.json')

// Utilisation du framework Express
const app = express()

// authaurisation du cross origin
app.use(cors({
    origin: '*'
}))

// Connection à la base de données
const dbConnect = new Sequelize('digital-ocean-context', 'root', '', {
    dialect: "mysql",
    host: 'localhost'
})

// Création du Model User : define('nom_de_la_table', {définition des colonnes})
const User = dbConnect.define('user', {
    favorites: {
        type: DataTypes.STRING,
        get(){
            return JSON.parse(this.getDataValue('favorites'))
        }
    },
    name: DataTypes.STRING,
},{
    freezeTableName: true,  // ne pas ajouter de s au nom de la table
    timestamps: false   // ne pas gérer les colonnes create_at et update_at
})

// Création du Model Ingredients : define('nom_de_la_table', {définition des colonnes})
const Ingredients = dbConnect.define('ingredient', {
    image: DataTypes.STRING,
    name: DataTypes.STRING
},{
    freezeTableName: true,
    timestamps: false
})

// Définition de l'url de récupération du user
// app.get('/ingredients', (req, res) => {
//     res.json(ingredients)
// })
app.get('/user', (req, res) => {
    User.findByPk(1).then((data) => {
        res.json(data)
    })
})

// Définition de l'url de récupération des ingrédients
// app.get('/ingredients', (req, res) => {
//     res.json(ingredients)
// })
app.get('/ingredients', (req, res) => {
    Ingredients.findAll().then((data) => {
        res.json(data)
    })
})

// Le serveur écoute sur le port 5000
app.listen(5000, () => console.log('Serveur à l\'écoute sur le port 5000'))
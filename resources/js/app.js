/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import Vue from 'vue';

const app = new Vue({
    el: '#app',
    data: {
        restaurants: [],
        filteredRestaurants: [],
        secondfilteredRestaurants: [],
        types: [],
        activeType: false ,
        nameRestaurant: "" ,
        checkedType:[],

    },

    methods : {
        //funzione per ricerca ristoranti assocciati al tipo singolo
        filterType(type) {
            console.log(type);
            this.filteredRestaurants = [];
            for( let i=0; i < this.restaurants.length; i++) {
                if(type == this.restaurants[i].type_id) {
                    this.filteredRestaurants.push(this.restaurants[i]);
                }
            }
            console.log(this.filteredRestaurants);
            this.activeType = true;
            console.log(this.activeType);
        },

        //funzione per ricerca nome ristorante
        nameSearch() {
            this.filteredRestaurants = [];
            this.nameRestaurant = this.nameRestaurant.toLowerCase().trim();
            for(let i=0; i < this.restaurants.length; i++ ) {
                if(this.restaurants[i].nameRestaurant.toLowerCase().includes(this.nameRestaurant)) {
                    if(!this.filteredRestaurants.includes(this.restaurants[i].nameRestaurant)) {
                        this.filteredRestaurants.push(this.restaurants[i].nameRestaurant);
                    }

                }

            }
            console.log(this.filteredRestaurants);
        },


        //funzione per ricerca ristoranti assocciati a vari tipi
        filterCheckType() {
            for(let b = 0; b < this.filteredRestaurants.length ; b++){
                for(let c = 0; c < this.restaurants.length; c++ ) {
                    if(!this.filteredRestaurants.includes(this.restaurants[c]) && this.restaurants[c].nameRestaurant == this.filteredRestaurants[b].nameRestaurant) {
                        this.filteredRestaurants.push(this.restaurants[c])
                    }
                }
            }
                    
        
            for(let i = 0; i < this.filteredRestaurants.length ; i++){
                for(let a = 0 ; a < this.checkedType.length ; a++){
                    if(this.checkedType[a] == this.filteredRestaurants[i].type_id){

                        if(!this.secondfilteredRestaurants.includes(this.filteredRestaurants[i].nameRestaurant)) {
                            this.secondfilteredRestaurants.push(this.filteredRestaurants[i].nameRestaurant);
                        }

                    }
                }
            }
            console.log(this.secondfilteredRestaurants);
        },

    },
    created() {
        axios
        .get("http://127.0.0.1:8000/api/restaurants")
        .then(response => {
            // handle success
            console.log(response.data);
            this.restaurants = response.data;
        })
        .catch(error => {
            // handle error
            console.log(error);
        });

        axios
        .get("http://127.0.0.1:8000/api/types")
        .then(response => {
            // handle success
            console.log(response.data);
            this.types = response.data;
        })
        .catch(error => {
            // handle error
            console.log(error);
        });
    }

});



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
        types: [] ,
        activeType: false ,
        nameRestaurant: "" ,

    },

    methods : {
        filterType(type) {
            console.log(type);
            this.filteredRestaurants = [];
            for( let i=0; i < this.restaurants.length; i++) {
                if(type == this.restaurants[i].type_id) {
                    this.filteredRestaurants.push(this.restaurants[i].nameRestaurant);
                }
            }
            console.log(this.filteredRestaurants);
            this.activeType = true;
            console.log(this.activeType);           
        },
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

        }

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


       
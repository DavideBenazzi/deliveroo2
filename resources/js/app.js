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
        //ricerca per nome e tipologia singola
        filteredRestaurants: [],
        //ricerca a più tipologie
        restFiltered:[],
        secondfilteredRestaurants: [],
        types: [],
        //ricerca per tipologia singola(homepage)
        activeType: false,
        //ricerca per nome del ristorante(advancedResearch)
        nameActive: false,
        //ricerca per tipologie multiple con checkbox(advancedResearch)
        typesActive:false,
        nameRestaurant: "" ,
        checkedType:[],
        finalFiltered:[],
        finalNameSearch:[],
        //variabili per type scelti e ristoranti ridondanti all'interno del array restFiltered
        nTypeChecked:0,
        nRestChecked:1,
        //variabili relative all'ordine
        checkedPlate:[],
        plates:[],
        orderedPlates: [],

    },

    methods : {

        //Funzione al change della pagina di dettaglio dell'user riferita all'ordine
        checkChart() {
            this.orderedPlates = [];

            for( let i = 0; i < this.checkedPlate.length; i++) {
                for( let c = 0; c < this.plates.length; c++) {
                    if(this.checkedPlate[i] == this.plates[c].id) {
                        this.orderedPlates.push(this.plates[c]);
                    }
                }
            }
            console.log(this.orderedPlates);
        },

        routing(id){
            return window.location + 'restaurants' + '/' + id ;
        },
        advrouting(id){
            return window.location + '/' + 'restaurants' + '/' + id ;
        },
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
            this.finalNameSearch = [];
            this.filteredRestaurants = [];
            this.nameRestaurant = this.nameRestaurant.toLowerCase().trim();

            for(let i=0; i < this.restaurants.length; i++ ) {
                if(this.restaurants[i].nameRestaurant.toLowerCase().includes(this.nameRestaurant)) {
                    if(!this.filteredRestaurants.includes(this.restaurants[i].nameRestaurant)) {
                        this.filteredRestaurants.push(this.restaurants[i].nameRestaurant);
                         //ciclo for con cui passo l'array con i nomi dei ristoranti giusti
                        for(let d=0; d < this.filteredRestaurants.length ; d++){
                            //if che serve a fare in modo di passare tutto l'oggetto e non solo il nome del ristorante corretto
                            if(this.filteredRestaurants[d] == this.restaurants[i].nameRestaurant){
                                this.finalNameSearch.push(this.restaurants[i]);
                            }
                        }
                    }

                }

            }
            this.nameActive=true;
            console.log(this.filteredRestaurants);
        },


        //funzione per ricerca ristoranti assocciati a vari tipi
        filterCheckType() {
            this.finalFiltered= [],
            this.filteredRestaurants = [],
            this.secondfilteredRestaurants = [];
            this.restFiltered = [];
            this.nTypeChecked = this.checkedType.length;
            //se le tipologie scelte sono meno di due entro
            if(this.nTypeChecked  < 2){
                //ciclo su restaurant e checked type per trovare corrispondenza trai i type id
                for(let i = 0; i < this.restaurants.length ; i++){
                    for(let a = 0 ; a < this.checkedType.length ; a++){
                        //se hanno stesso type_id pusho nel array
                        if(this.checkedType[a] == this.restaurants[i].type_id){
                            //array di confronto
                            this.restFiltered.push(this.restaurants[i].nameRestaurant);
                            //array di confronto 2
                            this.secondfilteredRestaurants.push(this.restaurants[i].nameRestaurant);
                            //array di stampa
                            this.finalFiltered.push(this.restaurants[i]);
                        }
                    }
                }
                //entro se le tipologie sono due o +
            }else{
                //ciclo uguale al precedente per popolare l'array con nomi ridondanti
                for(let i = 0; i < this.restaurants.length ; i++){
                    for(let a = 0 ; a < this.checkedType.length ; a++){
                        if(this.checkedType[a] == this.restaurants[i].type_id){
                            this.restFiltered.push(this.restaurants[i].nameRestaurant);
                        }
                    }
                    //ciclo su ristoranti già filtrati
                    for(let b = 0; b < this.restFiltered.length ; b++ ){
                        //se il ristorante con indice b è uguale a quello precedente (b-1)
                        if(this.restFiltered[b] == this.restFiltered[b-1]){
                            //incremento variabile che parte già di base uguale a 1
                            this.nRestChecked ++;
                            //se variabile incrementata è uguale al numero di type scelto
                            if(this.nRestChecked == this.nTypeChecked){
                                //controllo e pusho nel array  di controllo che il nome del ristorante sia ripetuto una sola volta
                                if(!this.secondfilteredRestaurants.includes(this.restFiltered[b])) {
                                    this.secondfilteredRestaurants.push(this.restFiltered[b]);
                                    //ciclo for con cui passo l'array con i nomi dei ristoranti giusti
                                    for(let z=0; z < this.secondfilteredRestaurants.length ; z++){
                                        //if che serve a fare in modo di passare tutto l'oggetto e non solo il nome del ristorante corretto
                                        if(this.secondfilteredRestaurants[z] == this.restaurants[i].nameRestaurant){
                                            this.finalFiltered.push(this.restaurants[i]);
                                        }
                                    }
                                }
                            }
                        }else{
                            //rimetto la variabile di confronto al valore iniziale di 1
                            this.nRestChecked = 1;
                        }
                    }
                }
            }
            this.typesActive=true;
            console.log(this.nTypeChecked);
            console.log(this.restFiltered);
            console.log(this.nRestChecked);
            console.log(this.secondfilteredRestaurants);
            console.log(this.finalFiltered);
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
        axios
        .get("http://127.0.0.1:8000/api/plates")
        .then(response => {
        // handle success
        console.log(response.data);
        this.plates = response.data;
        })
        .catch(error => {
        // handle error
        console.log(error);
        });
    }

});



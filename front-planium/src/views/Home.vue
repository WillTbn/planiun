<template>
  <div class="home">
    <b-overlay :show="show" rounded="sm">
    <b-container>
        <b-row v-if="mode == 'start' | mode == 'select' ">
            <b-col cols="12">
                <h1>
                    Escolha um de nossos planos
                </h1>
            </b-col>
            <b-col v-for="(plan, index) in plans" :key="index" >
                <b-card 
                    v-model="newPlans.id" 
                    bg-variant="light" 
                    :header=plan.record 
                    class="text-center select" 
                    @click.prevent="setPlan(plan,index,'add')"
                    
                >
                    <b-card-text>{{plan.name}}</b-card-text>
                </b-card>
            </b-col>
        </b-row>
        <b-button
            variant="success"
            class="my-5"
            v-if="mode == 'select'"
            @click="mode = 'dados'"
        >
            Continuar
        </b-button>
    </b-container>
    <b-container v-if="mode == 'dados'" class="text-center">        
        <b class="h5 font-weight-bolder my-md-2"> Adicionar beneficiarios</b> 
        <b-row align-h="center">
            <b-col cols="4">
                <b-card>
                    <label for="nameOne">Nome beneficiario 1</label>
                    <b-form-input 
                        type="text" 
                        v-model="benefOne.nome" 
                        placeholder="" 
                        id="nameOne"
                        required
                    >
                    </b-form-input>
                    <label for="anosOne">Idade beneficiario</label>
                    <b-form-input 
                        type="number" 
                        v-model="benefOne.anos" 
                        placeholder="" 
                        id="anosOne"
                        required
                    ></b-form-input>
                    
                </b-card>
            </b-col>
            <b-col cols="4" v-if="select == 'two'  |  select == 'three' | select == 'four' | select == 'five' | select == 'six'">
                <b-card class="shadow-lg">
                    <div class="d-flex flex-row-reverse">
                        <b-button @click="removeTwo()" variant="outline-success" size="sm" v-if="select == 'two'"> 
                            <i class="fa fa-window-close" aria-hidden="true"></i>
                        </b-button>
                    </div>
                    <label for="name">Nome beneficiario 2</label>
                    <b-form-input type="text" v-model="benefTwo.nome" placeholder="" id="name"></b-form-input>
                    <label for="anos">Idade beneficiario</label>
                    <b-form-input type="number" v-model="benefTwo.anos" placeholder="" id="anos"></b-form-input>                    
                </b-card>
            </b-col>
            <b-col cols="4" v-if="select == 'three' | select == 'four' | select == 'five' | select == 'six'">
                <b-card class="shadow-lg">
                    <div class="d-flex flex-row-reverse">
                        <b-button @click="removeThree()" variant="outline-success" size="sm" v-if="select == 'three'"> 
                            <i class="fa fa-window-close" aria-hidden="true"></i>
                        </b-button>
                    </div>
                    <label for="name">Nome beneficiario 3</label>
                    <b-form-input type="text" v-model="benefThree.nome" placeholder="" id="name"></b-form-input>
                    <label for="anos">Idade beneficiario</label>
                    <b-form-input type="number" v-model="benefThree.anos" placeholder="" id="anos"></b-form-input>
                    <b-button @click="removeThree()" variant="outline-success" size="sm" v-if="select == 'two'"> - </b-button>
                </b-card>
            </b-col>
            <b-col cols="4" v-if="select == 'four' | select == 'five' | select == 'six'">
                <b-card class="shadow-lg">
                    <div class="d-flex flex-row-reverse">
                        <b-button @click="removeFour()" variant="outline-success" size="sm" v-if="select == 'four' "> 
                            <i class="fa fa-window-close" aria-hidden="true"></i>
                        </b-button>
                    </div>
                    <label for="name">Nome beneficiario 4</label>
                    <b-form-input type="text" v-model="benefFour.nome" placeholder="" id="name"></b-form-input>
                    <label for="anos">Idade beneficiario</label>
                    <b-form-input type="number" v-model="benefFour.anos" placeholder="" id="anos"></b-form-input>
                    <b-button @click="removeFour()" variant="outline-success" size="sm" v-if="select == 'two'"> - </b-button>
                </b-card>
            </b-col>
            <b-col cols="4" v-if="select == 'five' | select == 'six'">
                <b-card class="shadow-lg">
                    <div class="d-flex flex-row-reverse">
                        <b-button @click="removeFive()" variant="outline-success" size="sm" v-if="select == 'five'"> 
                            <i class="fa fa-window-close" aria-hidden="true"></i>
                        </b-button>
                    </div>
                    <label for="name">Nome beneficiario 5</label>
                    <b-form-input type="text" v-model="benefFive.nome" placeholder="" id="name"></b-form-input>
                    <label for="anos">Idade beneficiario</label>
                    <b-form-input type="number" v-model="benefFive.anos" placeholder="" id="anos"></b-form-input>
                    
                </b-card>
            </b-col>
            <b-col cols="4" v-if="select == 'six'">
                <b-card class="shadow-lg">
                    <div class="d-flex flex-row-reverse">
                        <b-button @click="removeSix()" variant="outline-success" size="sm" v-if="select == 'six'"> 
                            <i class="fa fa-window-close" aria-hidden="true"></i>
                        </b-button>
                    </div>
                    <label for="name">Nome beneficiario 6</label>
                    <b-form-input type="text" v-model="benefSix.nome" placeholder="" id="name"></b-form-input>
                    <label for="anos">Idade beneficiario</label>
                    <b-form-input type="number" v-model="benefSix.anos" placeholder="" id="anos"></b-form-input>
                    
                </b-card>
            </b-col>
        </b-row>
        <b-row align-h="center">
            <b-col class="my-3">
                 <b-button @click="select = 'two'" variant="outline-success" size="sm" v-if="select== ''"> 
                    Adicionar 
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </b-button>
                <b-button @click="select = 'six'" variant="outline-success" size="sm" v-if="select == 'five'"> 
                    Adicionar 
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </b-button>
                <b-button @click="select = 'three'" variant="outline-success" size="sm" v-if="select == 'two'">
                    Adicionar 
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </b-button>
                <b-button @click="select = 'four'" variant="outline-success" size="sm" v-if="select == 'three'">
                    Adicionar 
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </b-button>
                <b-button @click="select = 'five'" variant="outline-success" size="sm" v-if="select == 'four'">
                    Adicionar 
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </b-button>
                <b-button @click="addNo()" variant="outline-success" size="sm" v-if="select == 'six'">
                    Adicionar 
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </b-button>
            </b-col>
        </b-row>
        <b-row align-h="between">
            <b-col>
                <b-button @click="mode = 'start'" variant="danger">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    Volta
                </b-button>
            </b-col>
            <b-col>
                <b-button @click="sendPost()" variant="success">
                    Avançar
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                </b-button>
            </b-col>
        </b-row>
        
    </b-container>
    <b-container v-if="mode == 'sucesso'" class="text-center">
        <h6 class="h5 font-weight-bolder"> Plano {{this.newPlans.name}}</h6>
        <b-row align-h="center">
            <b-col v-for="(beneficiarios, index) in dados.data_benef" :key="index" cols="3">
                <b-card class="shadow-lg">
                    <p> Nome :  {{beneficiarios.name}}</p>
                    <p> Idade : {{beneficiarios.ages}}</p>
                    <p> Preço : R$ <b>{{beneficiarios.price}},00 </b></p>
                </b-card>
            </b-col>
        </b-row>
        <b-row align-h="center" class="my-3">
            <b-col cols="6">
                <b-card class="shadow-lg bg-primary">
                    <p class="font-weight-bolder text-light h3"> Total : R$ {{dados.price_total}},00</p>
                </b-card>
            </b-col>
        </b-row>
        <b-row align-h="center" class="my-3">
            <b-col cols="3">
                <a :href=this.urlLink target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>
            </b-col>
        </b-row>
        <b-row align-h="between">
            <b-col>
                <b-button @click="mode = 'dados'" variant="danger">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    Volta 
                </b-button>
            </b-col>
            <b-col>
                <b-button @click="sendFinal()" variant="success">
                    Enviar 
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                </b-button>
            </b-col>
        </b-row>
    </b-container>
    <b-container v-if="mode == 'finally'">
        <b-row align-h="center">
            <b-col cols="6">
                <h1 class="h2">Completo </h1>
                <p>Dados enviado com sucesso</p>
                <p class="text-muted">Esse projeto tem como finalidade teste de conhecimento para empresa Platium.</p>
            </b-col>
        </b-row>
        <b-row align-h="center" class="my-3">
            <b-col cols="3">
                <a :href=this.urlProposta target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>
            </b-col>
        </b-row>
    </b-container>
    </b-overlay>
  </div>
</template>

<script>
// @ is an alias to /src
import axios from 'axios'

export default {
    name: 'Home',
    data(){
        return{
            show:false,
            plans:{},
            newPlans:{},
            quants:[1],
            mode: 'start',
            benefOne:{},
            benefTwo:{},
            benefThree:{},
            benefFour:{},
            benefFive:{},
            benefSix:{},
            select:'',
            send:{},
            dados:'',
            urlLink:'',
            urlProposta:''
        }
    },
    methods: {
        removeTwo(){
            this.select = ''
            this.benefTwo = {}
        },
        removeThree(){
            this.select = 'two'
            this.benefThree = {}
        },
        removeFour(){
            this.select = 'three'
            this.benefFour = {}
        },
        removeFive(){
            this.select = 'four'
            this.benefFive = {}
        },
        removeSix(){
            this.select = 'five'
            this.benefSix = {}
        },
        addNo(){
            this.$toasted.show('Numero máximo de beneficiarios atingido', {position: "top-center", duration: 2000})
        },
        getPlans(){
            this.show = true
            const url = 'http://127.0.0.1:8000/api/plans'
            axios.get(url).then(res=>{
                this.plans = res.data
                this.show = false
            })
        },
        setPlan(plans, index){
            this.newPlans = {...plans}
            const sle = document.querySelectorAll('.select')

            this.send = {
                'plans': this.newPlans.id
            }
            const filterSelect = Array.prototype.filter.call(sle, function(item){
                return item.classList.contains('selectSer')
            })
            if(filterSelect != ''){
                filterSelect[0].classList.remove('selectSer')
            }
            sle[index].classList.add('selectSer')
            console.log(sle[index])
            this.mode = 'select'
        },
        sendPost(){
            if(this.benefOne.nome != undefined && this.benefOne.nome != '' && this.benefOne.anos != undefined && this.benefOne.anos != ''){
                this.send.nome = this.benefOne.nome
                this.send.anos = this.benefOne.anos
            }
            if(this.benefTwo.nome != undefined && this.benefTwo.nome != '' && this.benefTwo.anos != undefined && this.benefTwo.anos != ''){
               this.send.nome = this.benefOne.nome+','+this.benefTwo.nome 
               this.send.anos = this.benefOne.anos+','+this.benefTwo.anos 
            }
            if(this.benefThree.anos != undefined && this.benefThree.nome != '' && this.benefThree.anos != undefined && this.benefThree.anos != ''){
               this.send.nome = this.benefOne.nome+','+this.benefTwo.nome+','+this.benefThree.nome
               this.send.anos = this.benefOne.anos+','+this.benefTwo.anos+','+this.benefThree.anos
            }
            if(this.benefFour.nome != undefined && this.benefFour.nome != '' && this.benefFour.anos != undefined && this.benefFour.anos != ''){
               this.send.nome = this.benefOne.nome+','+this.benefTwo.nome+','+this.benefThree.nome+','+this.benefFour.nome
               this.send.anos = this.benefOne.anos+','+this.benefTwo.anos+','+this.benefThree.anos+','+this.benefFour.anos
            }
            if(this.benefFive.nome != undefined && this.benefFive.nome != '' && this.benefFive.anos != undefined && this.benefFive.anos != ''){
                this.send.nome = this.benefOne.nome+','+this.benefTwo.nome+','+this.benefThree.nome+','+this.benefFour.nome+','+this.benefFive.nome
                this.send.anos = this.benefOne.anos+','+this.benefTwo.anos+','+this.benefThree.anos+','+this.benefFour.anos+','+this.benefFive.anos
            }
            if(this.benefSix.nome != undefined && this.benefSix.nome != '' && this.benefSix.anos != undefined && this.benefSix.anos != ''){
                this.send.nome = this.benefOne.nome+','+this.benefTwo.nome+','+this.benefThree.nome+','+this.benefFour.nome+','+this.benefFive.nome+','+this.benefSix.nome
                this.send.anos = this.benefOne.anos+','+this.benefTwo.anos+','+this.benefThree.anos+','+this.benefFour.anos+','+this.benefFive.anos+','+this.benefSix.anos
            }
            if(this.send.nome != undefined && this.send.nome != ''){
                const url = 'http://127.0.0.1:8000/api/contract'
                this.show = true
                axios.post(url, this.send).then(res=>{
                    this.dados = res.data.data
                    this.urlLink = res.data.url
                    console.log(res.data.url)
                    this.mode = 'sucesso'
                }).catch(error=>this.$toasted.error(error),{position: "top-center", duration: 2000}).finally(()=>this.show = false)

            }else{
                this.$toasted.error('Verifique campos vazios', {position: "top-center", duration: 2000})
            }

        },
        sendFinal(){
            this.show = true
            const url = 'http://127.0.0.1:8000/api/create'
            axios.post(url, this.dados).then(res=>{
                console.log(res.data)
                this.urlProposta = res.data.urlProposta
                this.mode = 'finally'
            }).catch(error=>this.$toasted.error(error,{position: "top-center", duration: 2000})).finally(()=>this.show = false)
        }
    },
    created() {
        this.getPlans()
    },
}
</script>
<style>
.select{
    cursor:pointer
}
.select:hover{
    border:3px solid #484848 !important
}
.selectSer{
    border:3px solid #28a745 !important;
    margin-top: 1rem;
}
</style>

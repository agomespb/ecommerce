new Vue({

    /** Elemento */
    el: '#vue',

    /** Inputs */
    data: {
        cep: '',
        endereco: {},
        naoLocalizado: false
    },

    attached: function(){

    },

    methods: {
        buscar: function(){

            if(/^[0-9]{5}-[0-9]{3}/.test(this.cep)){

                //window.console.log(this.cep);

                var self = this; //preservando o scopo (endereço)

                self.endereco = {};
                self.naoLocalizado = false;

                jQuery.getJSON('http://viacep.com.br/ws/'+this.cep+'/json/', function(endereco){

                    if(endereco.erro){
                        jQuery(self.$$.logradouro).focus();
                        self.naoLocalizado = true;
                        return;
                    }

                    self.endereco = endereco;
                    //jQuery(self.$$.nomedoinput).focus(); // seta o foco no campo!
                    //window.console.log(endereco);
                    //bairro: "Nordeste"cep: "59042-640"complemento: ""ibge: "2408102"localidade: "Natal"logradouro: "Rua Batuque"uf: "RN"

                });
            }
        }
    }
});
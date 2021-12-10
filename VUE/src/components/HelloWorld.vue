<template>
  <div class="container">
    <button id="create" v-on:click="createopen()">Create</button>
    <button id="delete" v-on:click="deleteopen()">Delete</button>
    <div id="createModal"  class="modal" >
      <div class="modal-content">
        <span v-on:click="createclose()" class="close">x</span>
        <label>Name:</label><br>
        <input type="text" id="crtname" name="crtname" value="">
        <input v-on:click="createrecord()" type="button" value="create">
      </div>
    </div>
    <div id="delModal"  class="modal" >
      <div class="modal-content">
        <span v-on:click="deleteclose()" class="close">x</span>
        <label>Id:</label><br>
        <input type="text" id="delname" name="delname" value="">
        <input v-on:click="deleterecord()" type="button" value="delete">
      </div>
    </div>
    <div id="app">
      {{arr}}
    </div>

  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  // props: {
  //   msg: String
  // },
  data(){
    return{
      arr:['Ура','я','умнее','чем','компьютер'],
      cname:[],
      did:[],
    }
  },
  methods:{
    createclose : function () {
      document.getElementById("createModal").style.display="none";
    },
    deleteclose : function () {
      document.getElementById("delModal").style.display="none";
    },
    createrecord: function ()
    {
      this.cname = document.getElementById('crtname').value;
      console.log(this.cname);
      this.arr.splice(this.arr.length,0,this.cname);
      alert("Вы добавили: ["+this.cname+ "] в массив arr ")
    },
    deleterecord: function ()
    {
      this.did = document.getElementById('delname').value;
      console.log(this.did);
      this.arr.splice(this.did,1);
      alert("Вы удалили элемент с индексом: ["+this.did+ "] из массива arr ")
    },
    createopen : function () {
      document.getElementById("createModal").style.display="block";
    },
    deleteopen : function () {
      document.getElementById("delModal").style.display="block";
    },

  }

}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
/*h3 {*/
/*  margin: 40px 0 0;*/
/*}*/
/*ul {*/
/*  list-style-type: none;*/
/*  padding: 0;*/
/*}*/
/*li {*/
/*  display: inline-block;*/
/*  margin: 0 10px;*/
/*}*/
/*a {*/
/*  color: #42b983;*/
/*}*/

.modal{
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.8);
}
.modal-content{

  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888 ;
  width: 50%;
}
.close{
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}
</style>

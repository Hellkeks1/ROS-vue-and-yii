<template>
  <div>
    <input v-model="name_of_university" placeholder="write university name">
    <input v-model="count_of_students" placeholder="write count of students">
    <input v-model="count_of_teachers" placeholder="write count of teachers">
    <button v-on:click="createUniversity">Create</button>
    <button v-on:click="updateData">Update</button>
    <div v-if="response">{{response}}</div>
    <div v-else>University not created!</div>
  </div>
  <table border="1" class="orientation_center">
    <caption>Таблица размеров обуви</caption>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>count_of_students</th>
      <th>count_of_teacher</th>
    </tr>
    <tr v-for="(value, index) in universities" :key="index">
      <td>{{value.id}}</td>
      <td>{{value.name}}</td>
      <td>{{value.count_of_students}}</td>
      <td>{{value.count_of_teachers}}</td>
    </tr>
  </table>
</template>

<script>
import {mapActions, mapState} from "vuex";
export default {
  name: "Universities",
  data() {
    return {
      name_of_university: "",
      count_of_students: "",
      count_of_teachers: "",
    }
  },
  methods: {
    ...mapActions(['POST_UNIVERSITY', 'GET_UNIVERSITIES', 'PUT_UNIVERSITIES']),
    /*createUniversity(){
      this.POST_UNIVERSITY({"name_of_university": this.name_of_university,
        "count_of_students": this.count_of_students, "count_of_teachers": this.count_of_teachers})
    },
    updateData(){
      this.PUT_UNIVERSITIES(id = 1, {"name_of_university": "UIB_NEW",
        "count_of_students": 12, "count_of_teachers": 3})
    }*/
  },
  computed: {
    ...mapState(['response', 'universities']),
  },
  async created() {
    await this.GET_UNIVERSITIES();
  }
}
</script>

<style scoped>
.orientation_center {
  margin-top: 10px;
  margin-left: auto;
  margin-right: auto;
}
</style>
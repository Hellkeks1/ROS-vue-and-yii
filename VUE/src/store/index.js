import { createStore } from 'vuex'
import axios from 'axios'
// import first_module from './modules/first_module/first_module'
export default createStore({
      state: {
        fake_jsons: [],
        text: '',
        response: '',
        universities: []
      },
      mutations: {
        SET_FAKE_JSON_DATA(state, fake_json_data){
          state.fake_jsons = fake_json_data;
        },
        SET_RESPONSE_DATA(state, data){
          state.response = data;
        },
        SET_UNIVERSITIES_DATA(state, universities){
          state.universities = universities;
        }
      },
      actions: {
        async GET_FAKE_JSON({commit}) {
          try {
            const {
              status,
              data
            } = await axios.get('https://jsonplaceholder.typicode.com/todos/' );
            if (status === 200) {
              console.log(data)
              commit("SET_FAKE_JSON_DATA", data)
            }
            return {
              success: true
            }
          } catch (e) {
            console.log(e.response);
            return {
              success: false,
              errors: e.response.data.errors
            }
          }
        },
        async POST_UNIVERSITY({state, commit}) {
          // console.log(value)
          console.log(state.text)
          try {
            const {
              status,
              data
            } = await axios.post('http://frontend.uib.kz/university/create', state.create);
            if (status === 200) {
              console.log(data, 'create')
              commit("SET_RESPONSE_DATA", data)
            }
            return {
              success: true
            }
          } catch (e) {
            console.log(e.response);
            return {
              success: false,
              errors: e.response.data
            }
          }
        },
        async GET_UNIVERSITIES({commit}){
          try {
            const {
              status,
              data
            } = await axios.get('http://frontend.uib.kz/university/get-all')
            if(status === 200){
              console.log(data)
              commit("SET_UNIVERSITIES_DATA", data)
            }
            return {
              success: true
            }
          }catch (e) {
            console.log(e.response);
            
            return {
              success: false,
              errors: e.response.data
            }
          }
        },
        async PUT_UNIVERSITIES({state, commit}, value) {
          // console.log(value)
          console.log(state.text)
          try {
            const {
              status,
              data
            } = await axios.put('http://frontend.uib.kz/university/update', value);
            if (status === 200) {
              console.log(data, 'create')
              commit("SET_RESPONSE_DATA", data)
            }
            return {
              success: true
            }
          } catch (e) {
            console.log(e.response);
            return {
              success: false,
              errors: e.response.data
            }
          }
        },
        async DELETE_UNIVERSITIES({state, commit},id) {
          // console.log(value)
          console.log(state.text)
          try {
            const {
              status,
              data
            } = await axios.put('http://frontend.uib.kz/university/delete?id='+id);
            if (status === 200) {
              console.log(data, 'create')
              commit("SET_RESPONSE_DATA", data)
            }
            return {
              success: true
            }
          } catch (e) {
            console.log(e.response);
            return {
              success: false,
              errors: e.response.data
            }
          }
        },
        /*modules: {
          first_module
        }*/
        state:{ create:
              {
                "id": 4,
                "name": "MUIT",
                "count_of_students": 829,
                "count_of_teachers": 34
              },
              id_read:{
                "id": 1
              },
              update: {
                "id": 1,
                "name": "KAZNUNU"
              },

        }
      }
    }
)
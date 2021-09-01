<template>
    <div>
        <input type="text" v-model="title" @keyup.enter="submit">        
        <div v-for="ToDo in NotCompleteToDOList"
            :key="ToDo.id"            
            @click="complete(ToDo.id)"
            class="text-center border-2 rounded hover:bg-gray-400"     
        >
            {{ ToDo.title }}
        </div>            
    </div>
</template>
<script>
export default {
    data() {
        return {
            ToDoList: [],
            title: '',
            NotCompleteToDOList: []         
        }
    },

    created() {
        axios.get('api/todo').then(res => {
                console.log(res);                
                this.ToDoList = res.data.list_arr;
        }).catch(error => {
            console.log(error)
        });
    },

    // watch: {
    //     ToDoList: function (newVal, oldVal) {
    //     this.NotCompleteToDOList = newVal.filter(todo => todo.completion_is === "0");
    //     }
    // },

    computed: {
        NotCompleteToDOList() {
            return this.ToDoList.filter(todo => todo.completion_is === "0");
        }
    },

    methods:{
      onClickRedirect() {   
          window.open("https://google.com", "_blank");    
      },

      submit() { 
          //if문을 쓴이유는 text가 있을 때만
            if(this.title) {
                axios.post('api/todo/title', {
                    title: this.title
                }).then(res => {                    
                    this.ToDoList = res.data.ToDoList;
                });
            }            
            //text를 저장하고 나서는 text창 초기화
            this.title='';
      },

      complete(id) {
          axios.get('api/todo/complete', {
              params: {
                  ToDoId: id
              }
          }).then(res => {
                console.log(res);
                this.ToDoList = res.data.list_arr;             
        });
      }
    }
}
</script>
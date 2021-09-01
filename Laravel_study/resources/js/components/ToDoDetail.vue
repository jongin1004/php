<template>
    <Header />
    <div class="container w-3/5 mt-32">
        <div class="text-center fs-1 mb-4" @click="redirectToHome">To Do Detail</div>        
        <div class="grid grid-cols-6 gap-4 border-3 rounded-1 mb-2 p-4 w-full" :style="!mode ? backgroud : null">
            <div class="col-start-1 col-end-6" :class="{ Done : !mode }" :style="hiddenText">{{ toDo.title }}</div>
            <div v-if="mode" class="col-start-7">
                <div class="grid grid-cols-2 text-sm">
                    <div>CreatedAt</div>
                    <div> {{ String(toDo.created_at).slice(0, 10) }}</div>
                </div>
                <div class="grid grid-cols-2 text-sm">
                    <div>DeadLine</div>
                    <div>{{ checkDeadLine(toDo.deadline) }}</div>
                </div>
            </div>
            <div v-else class="col-start-7">
                <div class="text-2xl font-black">Done !!</div>
            </div>           
        </div>
        <div class="border border-3 rounded-1 mb-2 p-4" :class="{ Done : !mode }" :style="!mode ? backgroud : null">
            <div class="col-8">{{ toDo.description !== null ? toDo.description : "詳細内容を書いてください。"}}</div>            
        </div>
        <div class="text-center">            
            <button  v-if="mode" type="button" class="btn btn-warning mr-2" @click="complete(toDo.id)">完了</button>       
            <button v-else type="button" class="btn btn-warning mr-2" @click="unComplete(toDo.id)">復旧</button>
            <button type="button" class="btn btn-primary" @click="redirectToDateSet(toDo.id)">詳細設定</button>         
        </div>                                            
    </div>
</template>

<script>
import Header from './Header.vue';

export default {
    props: {
        toDoId: {
            type: Number,
            required: true,
        }
    },

    components: {
        Header,
    },

    data() {
        return {
            id: this.toDoId,
            toDo: [],
            mode: true,                          
            hiddenText: {
                overflow: 'hidden',
                textOverflow: 'ellipsis',
                whiteSpace: 'nowrap'
            },
            backgroud: {
                backgroundColor: 'gray'
            }      
        }
    },

    created() {
        axios.get('../../api/todo/Showdetail', {
            params: {
                id: this.id
            }
        }).then(res => {
            this.toDo = res.data.todo_detail;
            this.mode = res.data.todo_detail.completion_is === "0" ? true : false;
            console.log(res);
        });
    },

    methods: {
        redirectToDateSet(id) {
            window.location.href = `/todo/setDetail/${id}`;
        },

        checkDeadLine(deadline) {
            return deadline !== null ? deadline : "undefined";
        },

        complete(id) {
          axios.get('../../api/todo/complete', {
              params: {
                  ToDoId: id
              }
          }).then(res => {
                console.log(res);
                // this.ToDoList = res.data.list_arr;             
        });
        this.mode = false; 
      },

      unComplete(id) {
          axios.get('../../api/todo/uncomplete', {
              params: {
                  ToDoId: id
              }
          }).then(res => {
                console.log(res);                          
        });
        this.mode = true;     
      },

      redirectToHome() {
            window.location.href = '/';
        }
    }
}
</script>

//scoped 는 현재 컴포넌트에서만 style이 먹도록 하는 것 (다른 컴포넌트에는 비적용)
<style scoped>
    .Done {
        text-decoration: line-through;        
    }
</style>
<template>
    <Header />

    <div class="container w-3/5">
        <div class="text-center fs-1 my-4">Set Detail</div>
        <div class="mb-2 border border-2 border-blue-300">
            <input type="text" class="w-full p-2 bg-gray-400" v-model="title">                  
        </div>
        <div class="mb-2 border border-2 border-blue-300">
            <div>
                <textarea rows="15" placeholder="詳しく書いてください。" v-model="description"
                    class="w-full bg-gray-400 p-2"></textarea>                    
            </div>
        </div>
        <div class="grid grid-cols-2 border border-2 border-blue-300 mb-2 p-2">
            <div>
                <span class="mr-2">Set Schedule</span>
                <span class="mr-4">
                    <input type="radio" name="schedule" value="pattern" v-model="schedule">
                    <label for="huey">Pattern</label> 
                </span>

                <span>
                    <input type="radio" name="schedule" value="deadline" v-model="schedule">
                    <label for="huey">Deadline</label> 
                </span>
            </div>

            <div v-if="schedule === 'pattern'">
                <span class="mr-2">Set Pattern</span>
                <span class="mr-4">
                    <input type="radio" name="pattern" value="daily" v-model="pattern">
                    <label for="huey">毎日</label>
                </span>

                <span>
                    <input type="radio" name="pattern" value="weekly" v-model="pattern">
                    <label for="huey">毎週</label> 
                </span>
                <div v-if="pattern === 'weekly'">
                    <span class="mr-2">Set Day</span>
                    <select class="bg-gray-400 text-white" v-model="day">
                        <template v-for="(day, i) in week" :key="i">
                            <option :value="day">{{ day }}</option>
                        </template>
                    </select>
                </div>
            </div>

            <div v-if="schedule === 'deadline'">
                <label for="date" class="text-sm">Set Deadline</label>                
                <input type="date" id="date" v-model="deadline" class="border border-1 border-dark ml-2 bg-gray-400">
            </div>
        </div>
        <div class="text-red-900 font-black">
            {{ errorMessage }}
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-warning" @click="submit(toDoId)">設定</button>
        </div>        
    </div>
</template>

<script>
import dayjs from 'dayjs'
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
        const today = dayjs().format("YYYY-MM-DD").split('-').map(str => Number(str));        
        return {
            today: new Date(today[0], today[1], today[2]).getTime(),            
            elapsedDay: '',
            title: '',
            description: '', 
            deadline: '',        
            errorMessage: '',
            todoList: '',
            schedule:'',
            pattern:'',
            setPattern:'',
            day: '',
            week: ['일', '월', '화', '수', '목', '금', '토'],
        }
    },

    created() {
        axios.get('../../api/todo/Showdetail', {
            params: {
                id: this.toDoId
            }
        }).then(res => {            
            this.todoList = res.data.todo_detail;
            this.title = res.data.todo_detail.title;
            this.description = res.data.todo_detail.description;
            this.deadline = res.data.todo_detail.deadline;

        })
    },

    methods: {
        submit(id) {
            if(this.description || this.deadline || this.pattern) {
                if(this.deadline) {
                    const deadline = this.deadline.split('-').map(str => Number(str));
                    const deadlineSec = new Date(deadline[0], deadline[1], deadline[2]).getTime();                    
                    const elapsedMSec = deadlineSec - this.today;
                    this.elapsedDay = elapsedMSec / 1000 / 60 / 60 / 24;                    
                    if(this.elapsedDay < 0) {
                        this.errorMessage = "DeadLineは、過去に設定できません";
                        return;
                    }
                }

                if(this.pattern) {
                    if(this.pattern === 'weekly') {
                        this.setPattern = this.day;
                    } else {
                        this.setPattern = "매일";
                    }
                }
                                
                axios.post('../../api/todo/updateDetail', {
                    description: this.description,
                    deadline: this.deadline,
                    id: id,
                    pattern: this.setPattern
                }).then(res => {                    
                    console.log(res);
                });
                window.location.href = `/todo/detail/${id}`;
            } else {
                this.errorMessage = "詳細内容 or DeadLineを作成してください。"
            }                
        },        
    }
}
</script>
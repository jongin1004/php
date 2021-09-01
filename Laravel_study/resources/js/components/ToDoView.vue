<template>
    <div>
        <div                    
            class="grid grid-cols-6 border-2 rounded hover:bg-gray-400 my-2"     
        >
            <div class="col-span-5 p-2" :style="hiddenText" @click="onClickToDetail(toDo.id)" :class="{ Done : !mode }">{{ toDo.title }}</div>
            <div class="col-span-1 pl-20" >
                <svg v-if="!IsImportant" @click="changeImportant(toDo.id)" xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="-25 -25 100 100"><path d="M48.856 22.731a3.56 3.56 0 00.906-3.671 3.56 3.56 0 00-2.892-2.438l-12.092-1.757a1.58 1.58 0 01-1.19-.865L28.182 3.043a3.56 3.56 0 00-3.212-1.996 3.56 3.56 0 00-3.211 1.996L16.352 14c-.23.467-.676.79-1.191.865L3.069 16.623A3.557 3.557 0 00.178 19.06a3.56 3.56 0 00.906 3.671l8.749 8.528c.373.364.544.888.456 1.4L8.224 44.702a3.559 3.559 0 001.424 3.502 3.552 3.552 0 003.772.273l10.814-5.686a1.583 1.583 0 011.472 0l10.815 5.686a3.568 3.568 0 003.772-.273 3.559 3.559 0 001.424-3.502L39.651 32.66a1.582 1.582 0 01.456-1.4l8.749-8.529zM37.681 32.998l2.065 12.042a1.553 1.553 0 01-.629 1.547 1.558 1.558 0 01-1.665.121l-10.815-5.687a3.588 3.588 0 00-3.334.001L12.49 46.708a1.56 1.56 0 01-1.666-.121 1.554 1.554 0 01-.629-1.547l2.065-12.042a3.581 3.581 0 00-1.03-3.17l-8.75-8.529a1.55 1.55 0 01-.4-1.621c.19-.586.667-.988 1.276-1.077l12.091-1.757a3.576 3.576 0 002.697-1.959l5.407-10.957a1.551 1.551 0 011.418-.881c.616 0 1.146.329 1.419.881l5.407 10.957a3.575 3.575 0 002.696 1.959l12.092 1.757a1.552 1.552 0 011.276 1.077c.19.585.041 1.191-.4 1.621l-8.749 8.528a3.58 3.58 0 00-1.029 3.171z"/></svg>
                <svg v-else @click="changeImportant(toDo.id)" width="45" height="45" viewBox="-12.5 -12.5 45 45" xmlns="http://www.w3.org/2000/svg"><path d="M23.363 8.584l-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584c-.606.093-.848.83-.423 1.265l5.36 5.494-1.267 7.767c-.101.617.558 1.08 1.103.777L12 20.245l6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.436.182-1.173-.423-1.266z" fill="#ffc107"/></svg>
            </div>
            <!-- <span>{{ toDo.deadline !== null ? toDo.deadline : undefined_deadline }}</span> -->
            <div class="col-span-6 text-end p-2" @click="onClickToDetail(toDo.id)">{{ mode ? printDDay() : "Done"}}</div>
        </div>
    </div>
</template>

<script>
import dayjs from 'dayjs'

export default {
    props: {
        toDo: {
            type:Object,            
        },
    },

    data(){
        const today = dayjs().format("YYYY-MM-DD").split('-').map(str => Number(str));
        const deadline = dayjs().format(this.toDo.deadline).split('-').map(str => Number(str));
        
        
        return {
            today: new Date(today[0], today[1], today[2]).getTime(),
            deadline: new Date(deadline[0], deadline[1], deadline[2]).getTime(),
            elapsedDay: '',
            IsImportant: this.toDo.important_is,
            mode: true,
            day: '',          
            hiddenText: {
                overflow: 'hidden',
                textOverflow: 'ellipsis',
                whiteSpace: 'nowrap'
            }
        }
    },

    created() {
        const elapsedMSec = this.deadline - this.today;
        this.elapsedDay = elapsedMSec / 1000 / 60 / 60 / 24;
        this.mode = this.toDo.completion_is === "0" ? true : false;
    },

    methods: {
        onClickToDetail(id) {
            this.$emit('onClickToDetail', id);
        },

        printDDay() {
            this.toDo.deadline !== null  ? `D - ${this.elapsedDay}` :  "時間を設定してください。";
            if ( this.toDo.deadline !== null ) {
                if ( this.elapsedDay < 0 ) {
                    return "Deadlineがもう過ぎました。";
                } else {
                    return `D - ${this.elapsedDay}`;
                }
            } else {
                return "Deadlineを設定してください。";
            }            
        },

        changeImportant(id) {
            axios.get('../../api/todo/important', {
                params: {
                    id: id
                }
            }).then(res => {
                this.IsImportant = res.data.ToDoList.important_is;
                this.$emit('reGetList');
            })
        },

        calculateDay() {
            const week = ['일', '월', '화', '수', '목', '금', '토'];
            const dayOfWeek = week[new Date(this.toDo.deadline).getDay()];

            return this.day = dayOfWeek;
        }
    },
} 
</script>


//scoped 는 현재 컴포넌트에서만 style이 먹도록 하는 것 (다른 컴포넌트에는 비적용)
<style scoped>
    .Done {
        text-decoration: line-through;
        color: gray;       
    }
</style>
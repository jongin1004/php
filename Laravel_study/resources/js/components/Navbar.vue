<template>
    <div>        
        <div class="border-b-2 p-2" @click="changeCategory('All')" ref="getDataAll">全体</div>
        <div class="border-b-2 p-2 p-2" @click="changeCategory('important')" ref="getData8080">重要</div>
        <!-- 패턴 dropbox -->
        <div class="form-floating border-b-2 py-2">
            <select class="form-select bg-gray-400" id="floatingSelect2" aria-label="Floating label select example" @change="changeCategory(pattern)" v-model="pattern" @click="Emptyalert">
                <template v-for="(value, i) in patternArr" :key="i">            
                    <option :value="value" :ref="`getData${value}`">{{ value }}</option>
                </template>                       
            </select>
            <label for="floatingSelect2" class="text-gray-600">Pattern</label>
        </div>
        <!-- 그룹 dropbox -->
        <div class="form-floating border-b-2 py-2">
            <select class="form-select bg-gray-400" id="floatingSelect" aria-label="Floating label select example" @change="changeCategory(categoryNum)" v-model="categoryNum" @click="Emptyalert">
                <template v-for="Group in groupArr" :key="Group.id">            
                    <option :value="Group.group_name" :ref="`getData${Group.group_name}`">{{ Group.group_name }}</option>
                </template>                       
            </select>
            <label for="floatingSelect" class="text-gray-600">Group with selects</label>
        </div>
        <!-- 그룹 생성 -->
        <div class="flex border-b-2 py-4 hover:bg-gray-500" @click="clickModal">
            <div class="flex-initial">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><g fill="#1138f7"><circle cx="256" cy="256" r="236.17"/><path d="M256 512C114.853 512 0 397.167 0 256 0 114.853 114.853 0 256 0c141.167 0 256 114.853 256 256 0 141.167-114.833 256-256 256zm0-472.341C136.705 39.659 39.659 136.705 39.659 256S136.705 472.341 256 472.341 472.341 375.275 472.341 256c0-119.295-97.046-216.341-216.341-216.341z"/></g><g fill="#fff"><path d="M256 373.193c-10.946 0-19.83-8.864-19.83-19.83V155.067c0-10.946 8.884-19.83 19.83-19.83 10.946 0 19.83 8.884 19.83 19.83v198.296c0 10.966-8.884 19.83-19.83 19.83z"/><path d="M355.148 274.045H156.852c-10.946 0-19.83-8.884-19.83-19.83 0-10.946 8.884-19.83 19.83-19.83h198.296c10.966 0 19.83 8.884 19.83 19.83 0 10.946-8.864 19.83-19.83 19.83z"/></g></svg>                
            </div>            
            <div class="ml-2 text-sm">グループ作り</div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        groupArr: {
            type:Object,
        }
    },
    
    data() {
        return {     
            categoryNum: '',
            pattern: '',
            patternArr: ["매일",'일', '월', '화', '수', '목', '금', '토'],
        }
    },

    methods: {
        changeCategory(status) {
            // const category = eval(`this.$refs.getData${Num}.innerHTML`);   

            // if(typeof(Num) !== "number") {
            //     Num = "pattern";
            // }

            // console.log(Num, category);
            // this.$emit("getCategoryNumber", Num, category); 
            this.$emit("getCategoryStatus", status);         
        },

        clickModal() {
            this.$emit('showModal');    
        },
        
        Emptyalert() {
            if( this.groupArr.length === 0) {
                alert('グループを作ってください。');
                return; 
            }
        },
    },
}
</script>
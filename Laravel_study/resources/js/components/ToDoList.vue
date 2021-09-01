<template>    
    <!-- Modal Popup -->
    <div class="black-bg" v-if="modal_is_state">
        <div class="white-bg">
            <div>
                <input class="border-4 border-pink-400 bg-gray-400 w-full p-2 mb-2" type="text" v-model="groupName" placeholder="グループ名を書いてください。">
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-primary mr-2" @click="createGroup">作り</button>
                <button type="button" class="btn btn-warning" @click="modal_is_state=false">閉める</button>
            </div>        
        </div>
    </div>

    <Header />

    <div class="flex h-full mt-16">
        <!-- Navbar Component -->
        <div class="w-1/5 border-r-2 border-solid border-gray-600 px-2">
            <Navbar :group-arr="Groups" @get-category-status="getcategoryStatus" @show-modal="showModal"/>
        </div>

        <div class="w-4/5 flex flex-col px-16">
            <!-- Nav에서 category가 변경될 때, categoryStatus값을 통해 바인딩받아서, Title에 해당하는 부분이 변경되도록 , 처음에는 All로 초기화되어 있음 -->
            <div class="text-center mb-4"><span class="fs-1"> {{ categoryStatus }} </span></div>
            <!-- 해야할 일, 완료한 일, 전체의 상태에 따라서, 몇 개의 ToDoList 값이 있는지를 보여주기 위함 -->
            <div v-if="currentState === '0'">해야할 일 : {{ NotCompleteToDoList.length }} </div>
            <div v-else-if="currentState === '1'">완료한 일 : {{ NotCompleteToDoList.length }}</div>
            <div v-else>전체 : {{ NotCompleteToDoList.length }}</div>

            <!-- important일 때와, pattern일 경우에는 따로 글을 그곳에서 작성하는 것이 아닌, 따로 별표시나, 상세설정에서 바꾸는 것이기 때문에 text form은 보이지 않도록한다.  -->
            <div class="flex-initial mt-2" v-if="categoryStatus !== 'important' && patternArr.indexOf(this.categoryStatus) < 0">
                <input 
                    type="text" 
                    v-model="title" 
                    @keyup.enter="submit" 
                    placeholder="ToDoを書いてください。" 
                    class="mb-4  border-4 border-pink-400 w-full p-2 text-black" 
                >
            </div>

            <!-- template v-for를 이용해서, DB에서 받아온 ToDoList를 computed에서 NotCompleteToDoList로 가공한뒤에 
            ToDoView 컴포넌트로 보냄  -->
            <template v-for="ToDo in NotCompleteToDoList" :key="ToDo.id" class="flex-1">
                <ToDoView :to-do="ToDo" @onClickToDetail="onClickRedirect(ToDo.id)" @re-get-list="reGetList"/>                                  
            </template>

            <!-- 해야할 일, 완료한 일, 전체의 상태를 변경할 수 있는 버튼 -->
            <div class="text-center mt-2">
                <button type="button" class="btn btn-warning" @click="changeState('0')">進行</button>            
                <button type="button" class="btn btn-primary mx-2" @click="changeState('1')">完了</button>      
                <button type="button" class="btn btn-primary" @click="changeState('all')">全体</button>      
            </div> 
        </div>
    </div>
    

    
</template>

<script>
import Header from "./Header.vue";
import Navbar from "./Navbar.vue";
import ToDoView from './ToDoView.vue';

export default {
    components: {
        ToDoView, //ToDO List를 보여주는 component
        Header, //Heeader component
        Navbar //Nav component
    },

    data() {
        return {            
            ToDoList: [], // ToDo Data를 저장하기 위함
            title: '', // ToDo 생성할 때, text form 값과 v-model로 바인딩
            currentState: "0", // 해야할 일, 완료한 일, 전체의 상태를 나타내기 위함
            Groups: [], //그룹 목록을 저장하기 위함
            categoryStatus: "All", // Nav에서 category변경값을 저장하기 위함, 처음에는 All로 초기화
            modal_is_state: false, // 모달창을 상태를 위함
            groupName: '', 
            patternArr: ["매일",'일', '월', '화', '수', '목', '금', '토'], //categoryStatus의 값과 비교해서, pattern에 해당되는지 확인하기 위함
        }
    },

    created() {
        //페이지를 불러올 때, axios를 통해서 DB에서 ToDo Data를 초기화
        axios.get('api/todo').then(res => {                        
                this.ToDoList = res.data.list_arr;
        });
        //페이지를 불러올 때, axios를 통해서 DB에서 Group Data를 초기화
        axios.get('api/group').then(res => {
            this.Groups = res.data.Groups;            
        });
    },

    computed: {
        NotCompleteToDoList() {
            if(this.categoryStatus == 'All') {
                return this.ToDoList.filter(todo => this.currentState === "all" || todo.completion_is === this.currentState)
                .sort(function (a, b) { return b.important_is - a.important_is });
            }
            if(this.categoryStatus == 'important') {
                return this.ToDoList.filter(todo => this.currentState === "all" && todo.important_is === 1 || todo.important_is === 1 && todo.completion_is === this.currentState );
            } 
            // 패턴일 경우에는, categoryStatus 값이 patternArr값에 포함되어있을 때이므로, indexOf를 이용해서 Arr안에 존재하는지 검사를한다. (없으면, 값이 -1이기 때문에 0보다 클 때)
            else if(this.patternArr.indexOf(this.categoryStatus) >= 0) {
                return this.ToDoList.filter(pattern => this.currentState === "all" && pattern.pattern === this.categoryStatus || pattern.pattern === this.categoryStatus && pattern.completion_is === this.currentState)
                .sort(function (a, b) { return b.important_is - a.important_is });
            } 
            // important일 경우와, pattern을 제외한 나머지 경우
            else {
                return this.ToDoList.filter(todo => this.currentState === "all" && todo.group === this.categoryStatus || todo.group === this.categoryStatus && todo.completion_is === this.currentState)
                .sort(function (a, b) { return b.important_is - a.important_is });
            }
        }
    },

    methods:{
      //ToDoView에서 해당  ToDo가 클릭될 때 emit을 통해 해당 함수를 실행
      // location을 통해서 해당 ToDo의 id값을 URL에 포함시켜 URL변경
      onClickRedirect(id) {           
        window.location.href = `/todo/detail/${id}`;
      },

      //text form에서 @keyup.enter를 통해서 enter를 눌렀다가 땟을 경우 실행되는 함수
      submit() { 
          //if문을 쓴이유는 text가 있을 때만
            if(this.title === '') {
                alert("글을 입력해야지!!");
            } else {
                axios.post('api/todo/title', {
                    title: this.title,
                    group: this.categoryStatus
                }).then(res => {                                        
                    this.ToDoList.push(res.data.ToDoList);
                });
            }         
            //text를 저장하고 나서는 text창 초기화
            this.title='';
      },

      
    //   complete(id) {
    //       axios.get('api/todo/complete', {
    //           params: {
    //               ToDoId: id
    //           }
    //       }).then(res => {            
    //             this.ToDoList = res.data.list_arr;             
    //     });
    //   },

      //해야할 일, 완료한 일, 전체의 버튼이 눌릴 때, 실행되는 함수
      //눌릴 때마다 해당 value값으로 변경
      changeState(value) {
          this.currentState = value;
          return;
      },

      //ToDoNav에서 Catagory가 변경될 경우 emit을 통해 함수를 수행
      //category value를 받아옴 
      getcategoryStatus(num) {
          this.categoryStatus = num;
          this.currentState = "0";
      },

      //ToDoView에서 중요표시를 눌렀을 때, emit을 통해서, 중요도순으로 다시 불러옴으로써 상위로 올라가도록 
      reGetList() {
          axios.get('api/todo').then(res => {                            
                this.ToDoList = res.data.list_arr;
        });
      },
      
      //modal창에서 group생성할 때 실행되는 함수
      createGroup() {
          axios.post('api/group/create', {
              group_name: this.groupName
          }).then(res => {              
              this.modal_is_state = false;
              this.Groups.push(res.data.Group);
              this.groupName = '';
          });
      },

      //ToDoNav에서 group생성을 누르면, emit을 통해서 해당 함수가 실행된다.
      //modal is status 값을 true로 변경시켜 v-if의 해당 태그가 보여지면서 모달창이 생기게됨
      showModal() {
          this.modal_is_state = true
      },
    }
}
</script>

// scoped는 해당 component에서만 동작하도록 해주는 명령어
// modal에 관련된 style설정이다.
<style scoped>
    .black-bg {
        width: 100%; height: 100%;
        background: rgba(57, 17, 90, 0.5); 
        position: fixed; padding: 20px;
    }
    .white-bg {
        width: 30%; background: white;
        border-radius: 8px;
        padding: 20px;
        position: absolute;
        top: 35%;
        left: 50%;        
        transform: translate(-50%, -50%)
    }
</style>
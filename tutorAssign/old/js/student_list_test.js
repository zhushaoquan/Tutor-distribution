/**
 * Created by wythe on 2016/12/14.
 */

var form_data = new Vue({
    el: '#form_data',
    data: {
        datas:[
            {
                sid: "031402201",
                name: "jack",
                gender: "男",
                rank: "1/132",
                gpa: "3.9",
                id: "第一志愿"
            },
            {
                sid: "031402201",
                name: "jack",
                gender: "男",
                rank: "1/132",
                gpa: "3.9",
                id: "第一志愿"
            },
            {
                sid: "031402201",
                name: "jack",
                gender: "男",
                rank: "1/132",
                gpa: "3.9",
                id: "第一志愿"
            },
            {
                sid: "031402201",
                name: "jack",
                gender: "男",
                rank: "1/132",
                gpa: "3.9",
                id: "第一志愿"
            }
        ]
    },
    methods:{
        select:function (index) {
            this.datas[index].selected = true;
        }
    }
});


var select_data = new vue({
    el: '#choiceout',
    data: {
        datas:[]

    }
});

function setSelectedDatas() {
    for(item in form_data.datas){
        if(item.selected){
            select_data.datas.push(item);
        }
    }
}


new Vue({
    el: "#Prices",
    data: {
        mainCategoryBoxes:[{
            subcategories:[
                {
                    subcategory:null,
                    price:0
                },
            ],
            category:null
        }],
        taza: 1
    },
    watch: {
        mainCategoryBoxes: function (newVal) {
            $(".main_category_select").chosen({
                disable_search_threshold: 200,
                max_selected_options:1,
                allow_single_deselect:true,
                width:'100%',
            });

        }
    },
    methods: {

        addCategory: function (){
            let newCategoryObject = {
                subcategories:[
                    {
                        subcategory:null,
                        price:0
                    },
                ],
                category:null
            };

            this.mainCategoryBoxe = this.mainCategoryBoxes.push(newCategoryObject)

        },
        addSubCategory: function (index){
            this.mainCategoryBoxes[index].subcategories.push({
                subcategory:null,
                price:0
            })
        },
        removeSubcategory: function (category_index,subcategory_index){
            let arr = this.mainCategoryBoxes[category_index].subcategories;
            if(arr.length > 1){
                this.mainCategoryBoxes[category_index].subcategories.splice(subcategory_index,1)
            }else{
                this.mainCategoryBoxes.splice(category_index,1)
            }

        },
        test: function () {
           return true
        }
    },
    mounted() {

    }
});

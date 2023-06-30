new Vue({
    el: '#permissions_page',
    data: {
        disabled: 1,
        selected: 'role_select',
        permissions: null,
        currentRole: null,
        full_checked: []
    },
    created() {
     this.disabled = 0;
        console.log(total, 'total')
    },
    watch: {
        selected: function (newValue) {
            if (newValue === 'role_select') {
                this.permissions = {}
                this.disabled = 0
            }
            if (parseInt(newValue)) {
                this.getRole(newValue)
            }
        },
    },
    methods: {
        getRole: async function(param = ''){
            this.currentRole = param
            axios.get(rolesRoute+'/'+param)
                .then(r => {
                    this.disabled = 1
                    let obj = {}
                    Object.entries(r.data[0]).map((v, k) => {
                        v[1].map((val, key) => {
                            let property = v[0]+val.method
                            obj[property] = val.method
                        })
                    })
                    this.permissions = obj

                    let full_checked = []
                    r.data[1].map((val) => {
                        let resultObject = this.setCheckAll(val.name, total);
                        if (resultObject.total === val.total) {
                            full_checked.push(val.name)
                        }
                    })
                    this.full_checked = full_checked

                    console.log(this.full_checked)

                })
                .catch(err => {})
        },
        getChecked: function (param) {
            if (this.full_checked.length > 0 && this.full_checked.includes(param)) {
                return true
            }
        },
        setCheckAll: function (nameKey, myArray) {
            for (let i=0; i < myArray.length; i++) {
                if (myArray[i].name === nameKey) {
                    return myArray[i];
                }
            }
        },
        changeAll: function (e) {
            console.log( e.target.value, e.target.checked)
        },
        setPermission: async function (e) {
            const payload = {
                role: this.currentRole,
                permission: e.target.value,
                condition: e.target.checked
            }
            await axios.post(setPermissionsRoute, payload)
            await this.getRole(this.currentRole)
            this.$forceUpdate()
        },
        compPermissions: function (param, param2) {
            if (this.permissions && this.permissions.hasOwnProperty(param) && this.permissions[param] === param2) {
                return true
            }
        }
    }
});

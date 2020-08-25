<template>
    <steps :options="stepperOptions" :is-valid="isValid">
        <div slot="step-1">
            <h3>Basic Details</h3>
            <basic-details :courses="courses" @update="updated"/>
        </div>

        <div slot="step-2">
            <h3>Questions</h3>
            <lesson />
        </div>
    </steps>
</template>

<script>
    import Steps from '../steps/steps';
    import BasicDetails from "./basic-details";
    import Lesson from "./lesson";
    export default {
        components: {Lesson, BasicDetails, Steps },
        props: ['courses'],
        data () {
            return {
                stepperOptions: {
                    headers: [
                        {title: 'Basic Details'},
                        {title: 'Quesions'},
                    ],
                    prevText: 'Previous',
                    nextText: 'Next'
                },
                isValid: false,
            }
        },
        methods: {
            updated: function(valid){
                this.isValid = valid;
            }
        }

    };
</script>

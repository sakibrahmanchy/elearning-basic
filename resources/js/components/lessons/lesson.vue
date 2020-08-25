<template>
    <div class="lesson">
        <div class="table-responsive">
            <h2 class="mt-2" align="center">Add questions to lesson</h2>
            <table class="table table-bordered" id="dynamic_field">
                <tbody v-for="(item, questionIndex) in questions">
                    <tr>
                        <label></label>
                    </tr>
                    <tr class="mt-2">
                        <label>Question {{ questionIndex+1 }}</label>
                        <input type="text" name="question" placeholder="Question Title" v-model="item.title"
                               class="form-control question_list" required
                        />
                    </tr>
                    <tr class="jumbotron" v-for="(option, optionIndex) in item.options">
                        <td>
                            <input type="text" name="options[]" placeholder="Question Options" v-model="option.name"
                                   class="form-control options_list" required
                            />
                        </td>
                        <td>
                            <input type="checkbox"
                                   name="correct[]"
                                   v-model="option.correct"
                                   placeholder="Check"
                                   class="form-control"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Mark as correct answer"
                            />
                        </td>
                        <td>
                            <button type="button"
                                    name="addAnswer"
                                    id="addAnswer"
                                    class="btn btn-success mb-2"
                                    v-on:click="addAnswer(questionIndex)">
                                Add Answer
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button name="addQuestion"
                    id="addQuestion"
                    class="btn btn-success mb-2 mr-2"
                    v-on:click="addQuestion()"
            >Add Question</button>
            <br>

            <div>
                <loading v-if="loading" class="cent" />
            </div>
            <br>
            <button v-if="!loading" name="saveLesson"
                    id="saveLesson"
                    class="btn btn-info btn-block"
                    v-on:click="saveLesson()"
            >Save Lesson</button>
            <br><br>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import Loading from '../loader/loading';

    export default {
        name: 'lesson',
        components: {Loading},
        data: function () {
            return {
                question: '',
                options: [],
                correct: [],
                loading: false,
            }
        },
        computed: {
            ...mapState({
                questions: state => state.lesson.questions,
            }),
        },
        methods: {
            addQuestion() {
                this.$store.commit('lesson/addQuestion');
            },
            addAnswer(questionIndex) {
                this.$store.commit('lesson/addAnswer', questionIndex);
            },
            saveLesson() {
                this.loading = true;
                this.$store.commit('lesson/saveLesson');
            }
        }
    }
</script>
<style scoped>
    .cent {
        margin: 0 auto;
    }
</style>

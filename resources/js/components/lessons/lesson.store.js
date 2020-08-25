import axios from 'axios';
const state = {
    course_id: 0,
    title: '',
    description: '',
    questions: [
        {
            title: '',
            options: [
                {
                    name: '',
                    correct: false,
                },
            ]
        }
    ],
};

function redirectToLessonsPage() {
    window.location.href = '/lessons';
};

function saveQuestionsToLesson(lessonId, questions) {
    axios.post(`/lessons/${lessonId}/questions`, {
        lesson_id: lessonId,
        questions: questions,
    }).then(response => {
        redirectToLessonsPage();
    }).catch(err => {
        redirectToLessonsPage();
    });
};

const mutations = {
    addQuestion(state) {
        const questions = state.questions;
        if (questions.length < 10) {
            questions.push({
                title: '',
                options: [
                    {
                        option: '',
                        correct: false,
                    }
                ]
            })
        }
    },
    addAnswer(state, questionIndex) {
        const questions = state.questions;
        const question = questions[questionIndex];
        if (question.options.length  < 4) {
            question.options.push({
                option: '',
                correct: false,
            });
        }
    },
    updateBasicDetails(state, data) {
      state.title = data.title || '';
      state.description = data.description || '';
      state.course_id = data.course_id || '';
    },
    saveLesson(state) {
        const {
            title = '',
            description = '',
            course_id = 0,
        } = state;
        axios.post("/lessons", {
            title,
            description,
            course_id,
        }).then(response => {
            console.log(response.data);
            if (response.data && response.data.id) {
                saveQuestionsToLesson(response.data.id, state.questions);
            } else {
                redirectToLessonsPage();
            }
        }).catch(() => {
            redirectToLessonsPage();
        });
    },
};
export default {
    namespaced: true,
    state,
    mutations,
}

document.addEventListener("DOMContentLoaded", () => {
    /*  Project Modal */
    const btnEditProjects = document.querySelectorAll(`.btn-edit-project`);
    const btnCreateProject = document.getElementById("btn-create-project");
    const projectForm = document.getElementById("project-form");
    const projectFormMethod = document.getElementById("projectFormMethod");
    const projectSubmitBtn = document.getElementById("project-submit-btn");

    btnCreateProject.addEventListener("click", () => {
        projectForm.reset();
        projectForm.action = "/project";
        projectFormMethod.value = "POST";
        projectForm
            .querySelectorAll(`input[name="tech-stacks[]"]`)
            .forEach((cb) => (cb.checked = false));
        projectSubmitBtn.textContent = "Create";
        Array.from(projectForm.querySelectorAll("input[type='file']")).forEach(
            (input) => input.setAttribute("required", ""),
        );
    });

    btnEditProjects.forEach((btn) =>
        btn.addEventListener("click", function () {
            projectForm.reset();

            const id = this.dataset.id;
            const title = this.dataset.title;
            const description = this.dataset.description;
            const date = this.dataset.date;
            const githubLink = this.dataset.github;
            const demoLink = this.dataset.demo;
            const status = this.dataset.status;
            const techStacks = JSON.parse(this.dataset.techs);

            projectForm.action = `/project/${id}`;
            projectFormMethod.value = "PUT";
            projectSubmitBtn.textContent = "Save";
            Array.from(
                projectForm.querySelectorAll("input[type='file']"),
            ).forEach((input) => input.removeAttribute("required"));

            projectForm.querySelector(`#title-input`).value = title;
            projectForm.querySelector(`#description-input`).value = description;
            projectForm.querySelector(`#date-input`).value = date;
            projectForm.querySelector(`#github-input`).value = githubLink;
            projectForm.querySelector(`#demo-input`).value = demoLink;

            Array.from(
                projectForm.querySelector("select[name='status']").options,
            ).forEach((option) => {
                option.selected = option.value === status;
            });

            projectForm
                .querySelectorAll(`input[name="tech-stacks[]"]`)
                .forEach((cb) => (cb.checked = false));

            techStacks.forEach((techStack) => {
                const checkBox = projectForm.querySelector(
                    `input[name='tech-stacks[]'][value='${techStack}']`,
                );
                if (checkBox) checkBox.checked = true;
            });
        }),
    );

    /* Skill Modal */
    const btnEditSkills = document.querySelectorAll(`.btn-edit-skill`);
    const skillForm = document.getElementById(`skill-form`);
    const btnCreateSkill = document.getElementById(`btn-create-skill`);
    const skillFormMethod = document.getElementById("skillFormMethod");
    const skillSubmitBtn = document.getElementById(`skill-submit-btn`);
    btnCreateSkill.addEventListener("click", () => {
        skillForm.reset();
        skillForm.action = "/skill";
        skillFormMethod.value = "POST";
        skillSubmitBtn.textContent = "Create";

        Array.from(skillForm.querySelectorAll(`input[type='file']`)).forEach(
            (input) => input.setAttribute("required", ""),
        );
    });

    btnEditSkills.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            skillForm.reset();

            const id = this.dataset.id;
            const title = this.dataset.title;
            const description = this.dataset.description;
            const type = this.dataset.type;

            skillForm.querySelector("#title-input").value = title;
            skillForm.querySelector("#description-input").value = description;
            skillForm.querySelector(`#type-input`).value = type;

            skillFormMethod.value = "PUT";
            skillForm.action = `/skill/${id}`;
            skillSubmitBtn.textContent = "Save";
            Array.from(
                skillForm.querySelectorAll(`input[type='file']`),
            ).forEach((input) => input.removeAttribute("required"));
        });
    });

    /* Read Skill Modal */
    const readSkillFormBtns = document.querySelectorAll(`.onclick-skill-card`);
    const skillBackground = document.getElementById(`skill-background`);
    const skillLogo = document.getElementById(`skill-logo`);
    const skillTitle = document.getElementById(`skill-title`);
    const skillType = document.getElementById(`skill-type`);
    const skillDescription = document.getElementById(`skill-description`);

    readSkillFormBtns.forEach((formBtn) => {
        formBtn.addEventListener("click", function (e) {
            Array.from(readSkillFormBtns).forEach((card) =>
                card.classList.remove("bg-primary"),
            );
            formBtn.classList.add("bg-primary");

            const dataHandler = formBtn.querySelector(".btn-edit-skill");

            skillBackground.src = dataHandler.dataset.background;
            skillLogo.src = dataHandler.dataset.logo;
            skillTitle.textContent = dataHandler.dataset.title;
            skillType.textContent = dataHandler.dataset.type;
            skillDescription.textContent = dataHandler.dataset.description;
        });
    });
});

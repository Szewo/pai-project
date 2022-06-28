create table user_details
(
    id      serial
        constraint user_details_pk
            primary key,
    name    varchar(100) not null,
    surname varchar(100) not null
);

alter table user_details
    owner to dukujropafgvhs;

create unique index user_details_id_uindex
    on user_details (id);

create table gyms
(
    id      serial
        constraint gyms_pk
            primary key,
    name    varchar(100) not null,
    address varchar(100) not null
);

alter table gyms
    owner to dukujropafgvhs;

create unique index gyms_id_uindex
    on gyms (id);

create table user_roles
(
    id   serial
        constraint user_roles_pk
            primary key,
    role varchar not null
);

alter table user_roles
    owner to dukujropafgvhs;

create table users
(
    id              serial
        constraint users_pk
            primary key,
    id_user_details integer           not null
        constraint users_user_details_id_fk
            references user_details
            on update cascade on delete cascade,
    email           varchar(255)      not null,
    password        varchar(255)      not null,
    id_role         integer default 1 not null
        constraint users_user_roles_id_fk
            references user_roles
            on update cascade
);

alter table users
    owner to dukujropafgvhs;

create unique index users_id_uindex
    on users (id);

create table workouts
(
    id      serial
        constraint workouts_pk
            primary key,
    name    varchar(100) not null,
    date    date         not null,
    id_user integer      not null
        constraint workouts_users_id_fk
            references users
            on update cascade on delete cascade
);

alter table workouts
    owner to dukujropafgvhs;

create unique index workouts_id_uindex
    on workouts (id);

create table exercises
(
    id          serial
        constraint exercises_pk
            primary key,
    id_workout  integer      not null
        constraint exercises_workouts_id_fk
            references workouts
            on update cascade on delete cascade,
    name        varchar(100) not null,
    sets        integer      not null,
    repetitions integer      not null,
    weight      varchar(5)   not null,
    break       integer      not null
);

alter table exercises
    owner to dukujropafgvhs;

create unique index exercises_id_uindex
    on exercises (id);

create table gyms_users
(
    id_user integer not null
        constraint gyms_users_users_id_fk
            references users
            on update cascade on delete cascade,
    id_gym  integer not null
        constraint gyms_users_gyms_id_fk
            references gyms
            on update cascade on delete cascade
);

alter table gyms_users
    owner to dukujropafgvhs;

create unique index user_roles_id_uindex
    on user_roles (id);

create view view_user_data(id, email, password, id_role, name, surname) as
SELECT u.id,
       u.email,
       u.password,
       u.id_role,
       ud.name,
       ud.surname
FROM users u
         LEFT JOIN user_details ud ON u.id_user_details = ud.id;

alter table view_user_data
    owner to dukujropafgvhs;

INSERT INTO public.exercises (id, id_workout, name, sets, repetitions, weight, break) VALUES (4, 6, 'test', 12, 20, '90', 6);
INSERT INTO public.user_details (id, name, surname) VALUES (8, 'Mateusz', 'Szewczyk');
INSERT INTO public.user_details (id, name, surname) VALUES (9, 'Test', 'User');
INSERT INTO public.user_details (id, name, surname) VALUES (10, 'test', 'test');
INSERT INTO public.user_details (id, name, surname) VALUES (11, 'test', 'test');
INSERT INTO public.user_roles (id, role) VALUES (1, 'anonymous');
INSERT INTO public.user_roles (id, role) VALUES (2, 'registered');
INSERT INTO public.user_roles (id, role) VALUES (3, 'admin');
INSERT INTO public.users (id, id_user_details, email, password, id_role) VALUES (5, 8, 'admin@gymbro.com', '$2y$10$3/A/maOSVWxM3kr19jlfbe8Iyrjz9V9H6c69R8D32cKLRyPGLbAg6', 1);
INSERT INTO public.users (id, id_user_details, email, password, id_role) VALUES (6, 9, 'test@gymbro.com', '$2y$10$iOQlYudDw32Xy4X/RdE9b.ftBq5Wat1m17ddKD6H6D5mE0RbxSKhS', 1);
INSERT INTO public.users (id, id_user_details, email, password, id_role) VALUES (7, 10, 'test2@gymbro.com', '$2y$10$s8cHWZwuA9ZNuzVWBG8oP.zpwTktFqXKEw07pPoED0xIt5uLdn6a2', 1);
INSERT INTO public.users (id, id_user_details, email, password, id_role) VALUES (8, 11, 'test3@gymbro.com', '$2y$10$DFO.E/HaD9zr1OD65xEvsOD0PMCWp7/UIOkFUPz4DEORFAU6a0SsK', 1);
INSERT INTO public.view_user_data (id, email, password, id_role, name, surname) VALUES (5, 'admin@gymbro.com', '$2y$10$3/A/maOSVWxM3kr19jlfbe8Iyrjz9V9H6c69R8D32cKLRyPGLbAg6', 1, 'Mateusz', 'Szewczyk');
INSERT INTO public.view_user_data (id, email, password, id_role, name, surname) VALUES (6, 'test@gymbro.com', '$2y$10$iOQlYudDw32Xy4X/RdE9b.ftBq5Wat1m17ddKD6H6D5mE0RbxSKhS', 1, 'Test', 'User');
INSERT INTO public.view_user_data (id, email, password, id_role, name, surname) VALUES (7, 'test2@gymbro.com', '$2y$10$s8cHWZwuA9ZNuzVWBG8oP.zpwTktFqXKEw07pPoED0xIt5uLdn6a2', 1, 'test', 'test');
INSERT INTO public.view_user_data (id, email, password, id_role, name, surname) VALUES (8, 'test3@gymbro.com', '$2y$10$DFO.E/HaD9zr1OD65xEvsOD0PMCWp7/UIOkFUPz4DEORFAU6a0SsK', 1, 'test', 'test');
INSERT INTO public.workouts (id, name, date, id_user) VALUES (3, 'Testowy workoutsdfgfn', '2022-11-17', 5);
INSERT INTO public.workouts (id, name, date, id_user) VALUES (6, 'My new workout 2', '2022-08-01', 6);
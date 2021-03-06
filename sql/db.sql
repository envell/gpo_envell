USE [master]
GO
/****** Object:  Database [1]    Script Date: 08.10.2015 2:15:12 ******/
CREATE DATABASE [1]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'1', FILENAME = N'C:\DATA\1.mdf' , SIZE = 4096KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'1_log', FILENAME = N'C:\DATA\1_log.ldf' , SIZE = 3456KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [1] SET COMPATIBILITY_LEVEL = 100
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [1].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [1] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [1] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [1] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [1] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [1] SET ARITHABORT OFF 
GO
ALTER DATABASE [1] SET AUTO_CLOSE ON 
GO
ALTER DATABASE [1] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [1] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [1] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [1] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [1] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [1] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [1] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [1] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [1] SET  DISABLE_BROKER 
GO
ALTER DATABASE [1] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [1] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [1] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [1] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [1] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [1] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [1] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [1] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [1] SET  MULTI_USER 
GO
ALTER DATABASE [1] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [1] SET DB_CHAINING OFF 
GO
ALTER DATABASE [1] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [1] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
ALTER DATABASE [1] SET DELAYED_DURABILITY = DISABLED 
GO
USE [1]
GO
/****** Object:  Table [dbo].[all_hospitalization]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[all_hospitalization](
	[id] [int] NOT NULL,
	[planned_hospitalization] [int] NOT NULL,
	[wait_up_to_7_days] [int] NULL,
	[wait_up_to_8_14 days] [int] NULL,
	[wait_up_to_15_30_days] [int] NULL,
	[waiting_for_more_30_days] [int] NULL,
	[department_id] [int] NOT NULL,
 CONSTRAINT [PK_all_hospitalization] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[attendance_at_the_clinic]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[attendance_at_the_clinic](
	[id] [int] NOT NULL,
	[total] [int] NOT NULL,
	[disease] [int] NULL,
	[preventive] [int] NULL,
	[the_share_of_visits_id] [int] NOT NULL,
 CONSTRAINT [PK_attendance_at_the_clinic] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[bed_type]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[bed_type](
	[id] [int] NOT NULL,
	[bed_type] [nchar](50) NOT NULL,
 CONSTRAINT [PK_bed_type] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[date]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[date](
	[id] [int] NOT NULL,
	[date] [date] NULL,
 CONSTRAINT [PK_date] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[department]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[department](
	[id] [int] NOT NULL,
	[the name of the department] [nchar](50) NOT NULL,
	[module_id] [int] NOT NULL,
 CONSTRAINT [PK_department] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[financing_product]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[financing_product](
	[id] [int] NOT NULL,
	[financing_product] [char](50) NOT NULL,
 CONSTRAINT [PK_financing_product] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[home_visits]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[home_visits](
	[id] [int] NOT NULL,
	[total] [int] NULL,
	[disease] [int] NULL,
	[preventive] [int] NULL,
	[the_share_of_visits_id] [int] NOT NULL,
 CONSTRAINT [PK_home_visits] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[implementation_of_the_plan_of_work_LPU]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[implementation_of_the_plan_of_work_LPU](
	[id] [int] NOT NULL,
	[treated_patients] [int] NULL,
	[held_bed_days] [int] NULL,
	[the_average_duration_of_treatment] [int] NULL,
	[bed_occupancy] [int] NULL,
	[value_id] [int] NOT NULL,
 CONSTRAINT [PK_implementation_of_the_plan_of_work_LPU] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[module]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[module](
	[id] [int] NOT NULL,
	[the_name_of_the_module] [nchar](50) NOT NULL,
 CONSTRAINT [PK_module] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[norm]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[norm](
	[id] [int] NOT NULL,
	[bed_occupancy] [int] NOT NULL,
	[the_average_duration] [int] NOT NULL,
	[of_all_hospitalizations] [int] NOT NULL,
	[department_id] [int] NOT NULL,
 CONSTRAINT [PK_norm] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[number_of_beds ]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[number_of_beds ](
	[id] [int] NOT NULL,
	[number_of_beds] [int] NOT NULL,
	[department_id] [int] NOT NULL,
	[bed_type_id] [int] NOT NULL,
 CONSTRAINT [PK_number_of_beds_2] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[number_of_beds_place]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[number_of_beds_place](
	[id] [int] NOT NULL,
	[the_fact_of_the_number_of_beds] [int] NOT NULL,
	[it_consisted_in_the_slack_of_the_day] [int] NOT NULL,
	[received] [int] NULL,
	[writtn_out] [int] NULL,
	[died] [int] NULL,
	[date_id] [int] NOT NULL,
	[department_id] [int] NOT NULL,
 CONSTRAINT [PK_number_of_beds] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[plan_load_on_the_number_of_visits]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[plan_load_on_the_number_of_visits](
	[id] [int] NOT NULL,
	[attendance_for_the_year] [int] NOT NULL,
 CONSTRAINT [PK_plan_load_on_the_number_of_visits] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[plan_to_work_LPU]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[plan_to_work_LPU](
	[id] [int] NOT NULL,
	[the_number_of_patients_treated] [int] NOT NULL,
	[held_bed_days] [int] NOT NULL,
	[the_average_duration_of_treatment] [int] NOT NULL,
	[bed_occupancy] [int] NOT NULL,
	[number_of_beds] [int] NOT NULL,
	[department_id] [int] NOT NULL,
 CONSTRAINT [PK_plan_to_work_LPU] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[pluralism]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[pluralism](
	[id] [int] NOT NULL,
	[pluralism] [nchar](150) NULL,
	[staff_id] [int] NOT NULL,
	[position_id] [int] NOT NULL,
 CONSTRAINT [PK_pluralism] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[position]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[position](
	[id] [int] NOT NULL,
	[position] [nchar](50) NULL,
	[staffing_id] [int] NOT NULL,
	[financing_product_id] [int] NOT NULL,
	[the_number_of_frames_id] [int] NOT NULL,
	[rate_staff_id] [int] NOT NULL,
	[load_plan_id] [int] NOT NULL,
 CONSTRAINT [PK_position] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[rate_staff]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[rate_staff](
	[id] [int] NOT NULL,
	[rate_staff] [real] NOT NULL,
 CONSTRAINT [PK_rate_staff] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[rates_fact]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[rates_fact](
	[id] [int] NOT NULL,
	[rates_fact] [real] NULL,
	[staff_id] [int] NOT NULL,
	[position_id] [int] NOT NULL,
 CONSTRAINT [PK_rates_fact] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[staff]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[staff](
	[id] [int] NOT NULL,
	[surname] [nchar](150) NULL,
	[name] [nchar](150) NULL,
	[patronymic] [nchar](150) NOT NULL,
	[decree] [bit] NULL,
	[module_id] [int] NOT NULL,
	[position_id] [int] NOT NULL,
 CONSTRAINT [PK_staff1] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[staffing]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[staffing](
	[id] [int] NOT NULL,
	[busy_office] [real] NULL,
	[individuals] [real] NULL,
	[the_coefficient_of_combining] [real] NULL,
 CONSTRAINT [PK_staffing] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[the_load_on_the_number_of_visits]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[the_load_on_the_number_of_visits](
	[id] [int] NOT NULL,
	[total_visits] [int] NULL,
	[load_position] [real] NULL,
	[load_year] [real] NULL,
	[execution_load] [real] NULL,
	[staff_id] [int] NOT NULL,
	[position_id] [int] NOT NULL,
 CONSTRAINT [PK_the_load_on_the_number_of_visits] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[the_number_of_frames]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[the_number_of_frames](
	[id] [int] NOT NULL,
	[the_number_of_persons_in_the_decree] [int] NULL,
	[principal_place_of_work] [int] NOT NULL,
	[internal_external_pluralism] [int] NOT NULL,
 CONSTRAINT [PK_the_number_of_frames] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[the_regulations_for_the_operation_LPU]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[the_regulations_for_the_operation_LPU](
	[id] [int] NOT NULL,
	[bed_occupancy] [int] NULL,
	[the_average_duration] [int] NULL,
	[of_all_hospitalizations] [int] NULL,
	[value_id] [int] NOT NULL,
 CONSTRAINT [PK_the_regulations_for_the_operation_LPU] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[the_share_of_visits]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[the_share_of_visits](
	[id] [int] NOT NULL,
	[at_home] [real] NULL,
	[disease] [real] NULL,
	[preventive] [real] NULL,
	[OMS] [real] NULL,
	[budget] [real] NULL,
	[paid] [real] NULL,
	[staff_id] [int] NOT NULL,
	[date_id] [int] NOT NULL,
 CONSTRAINT [PK_the_share_of_visits] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[users]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[users](
	[id] [int] NOT NULL,
	[surname] [nchar](150) NOT NULL,
	[name] [nchar](150) NOT NULL,
	[patronymic] [nchar](150) NOT NULL,
	[login] [char](30) NOT NULL,
	[password] [char](30) NOT NULL,
	[position] [nchar](50) NOT NULL,
	[email] [char](150) NOT NULL,
	[phone] [char](20) NULL,
	[department_id] [int] NOT NULL,
 CONSTRAINT [PK_users] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[value]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[value](
	[id] [int] NOT NULL,
	[treated] [real] NOT NULL,
	[held_bed_days] [real] NOT NULL,
	[the_average_occupancy_rate] [real] NOT NULL,
	[the_average_occupancy_rate_at_year_end] [real] NOT NULL,
	[the_average_duration_of_treatment] [real] NOT NULL,
	[bed_turnover] [real] NOT NULL,
	[patients_years] [real] NOT NULL,
	[department_id] [int] NOT NULL,
 CONSTRAINT [PK_value] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[visits_by_type_of_payment]    Script Date: 08.10.2015 2:15:12 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[visits_by_type_of_payment](
	[id] [int] NOT NULL,
	[OMS] [int] NULL,
	[budget] [int] NULL,
	[paid] [int] NULL,
	[the_share_of_visits_id] [int] NOT NULL,
 CONSTRAINT [PK_visits_by_type_of_payment] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
ALTER TABLE [dbo].[all_hospitalization]  WITH CHECK ADD  CONSTRAINT [FK_all_hospitalization_department] FOREIGN KEY([department_id])
REFERENCES [dbo].[department] ([id])
GO
ALTER TABLE [dbo].[all_hospitalization] CHECK CONSTRAINT [FK_all_hospitalization_department]
GO
ALTER TABLE [dbo].[attendance_at_the_clinic]  WITH CHECK ADD  CONSTRAINT [FK_attendance_at_the_clinic_the share_of_visits] FOREIGN KEY([the_share_of_visits_id])
REFERENCES [dbo].[the_share_of_visits] ([id])
GO
ALTER TABLE [dbo].[attendance_at_the_clinic] CHECK CONSTRAINT [FK_attendance_at_the_clinic_the share_of_visits]
GO
ALTER TABLE [dbo].[department]  WITH CHECK ADD  CONSTRAINT [FK_department_module] FOREIGN KEY([module_id])
REFERENCES [dbo].[module] ([id])
GO
ALTER TABLE [dbo].[department] CHECK CONSTRAINT [FK_department_module]
GO
ALTER TABLE [dbo].[home_visits]  WITH CHECK ADD  CONSTRAINT [FK_home_visits_the_share_of_visits] FOREIGN KEY([the_share_of_visits_id])
REFERENCES [dbo].[the_share_of_visits] ([id])
GO
ALTER TABLE [dbo].[home_visits] CHECK CONSTRAINT [FK_home_visits_the_share_of_visits]
GO
ALTER TABLE [dbo].[implementation_of_the_plan_of_work_LPU]  WITH CHECK ADD  CONSTRAINT [FK_implementation_of_the_plan_of_work_LPU_value] FOREIGN KEY([id])
REFERENCES [dbo].[value] ([id])
GO
ALTER TABLE [dbo].[implementation_of_the_plan_of_work_LPU] CHECK CONSTRAINT [FK_implementation_of_the_plan_of_work_LPU_value]
GO
ALTER TABLE [dbo].[norm]  WITH CHECK ADD  CONSTRAINT [FK_norm_department] FOREIGN KEY([department_id])
REFERENCES [dbo].[department] ([id])
GO
ALTER TABLE [dbo].[norm] CHECK CONSTRAINT [FK_norm_department]
GO
ALTER TABLE [dbo].[number_of_beds ]  WITH CHECK ADD  CONSTRAINT [FK_number_of_beds_bed_type] FOREIGN KEY([bed_type_id])
REFERENCES [dbo].[bed_type] ([id])
GO
ALTER TABLE [dbo].[number_of_beds ] CHECK CONSTRAINT [FK_number_of_beds_bed_type]
GO
ALTER TABLE [dbo].[number_of_beds ]  WITH CHECK ADD  CONSTRAINT [FK_number_of_beds_department] FOREIGN KEY([department_id])
REFERENCES [dbo].[department] ([id])
GO
ALTER TABLE [dbo].[number_of_beds ] CHECK CONSTRAINT [FK_number_of_beds_department]
GO
ALTER TABLE [dbo].[number_of_beds_place]  WITH CHECK ADD  CONSTRAINT [FK_number_of_beds_place_date] FOREIGN KEY([date_id])
REFERENCES [dbo].[date] ([id])
GO
ALTER TABLE [dbo].[number_of_beds_place] CHECK CONSTRAINT [FK_number_of_beds_place_date]
GO
ALTER TABLE [dbo].[number_of_beds_place]  WITH CHECK ADD  CONSTRAINT [FK_number_of_beds_place_department] FOREIGN KEY([department_id])
REFERENCES [dbo].[department] ([id])
GO
ALTER TABLE [dbo].[number_of_beds_place] CHECK CONSTRAINT [FK_number_of_beds_place_department]
GO
ALTER TABLE [dbo].[plan_to_work_LPU]  WITH CHECK ADD  CONSTRAINT [FK_plan_to_work_LPU_department] FOREIGN KEY([department_id])
REFERENCES [dbo].[department] ([id])
GO
ALTER TABLE [dbo].[plan_to_work_LPU] CHECK CONSTRAINT [FK_plan_to_work_LPU_department]
GO
ALTER TABLE [dbo].[pluralism]  WITH CHECK ADD  CONSTRAINT [FK_pluralism_position] FOREIGN KEY([position_id])
REFERENCES [dbo].[position] ([id])
GO
ALTER TABLE [dbo].[pluralism] CHECK CONSTRAINT [FK_pluralism_position]
GO
ALTER TABLE [dbo].[pluralism]  WITH CHECK ADD  CONSTRAINT [FK_pluralism_staff] FOREIGN KEY([staff_id])
REFERENCES [dbo].[staff] ([id])
GO
ALTER TABLE [dbo].[pluralism] CHECK CONSTRAINT [FK_pluralism_staff]
GO
ALTER TABLE [dbo].[position]  WITH CHECK ADD  CONSTRAINT [FK_position_financing_product] FOREIGN KEY([financing_product_id])
REFERENCES [dbo].[financing_product] ([id])
GO
ALTER TABLE [dbo].[position] CHECK CONSTRAINT [FK_position_financing_product]
GO
ALTER TABLE [dbo].[position]  WITH CHECK ADD  CONSTRAINT [FK_position_plan_load_on_the_number_of_visits] FOREIGN KEY([load_plan_id])
REFERENCES [dbo].[plan_load_on_the_number_of_visits] ([id])
GO
ALTER TABLE [dbo].[position] CHECK CONSTRAINT [FK_position_plan_load_on_the_number_of_visits]
GO
ALTER TABLE [dbo].[position]  WITH CHECK ADD  CONSTRAINT [FK_position_rate_staff] FOREIGN KEY([rate_staff_id])
REFERENCES [dbo].[rate_staff] ([id])
GO
ALTER TABLE [dbo].[position] CHECK CONSTRAINT [FK_position_rate_staff]
GO
ALTER TABLE [dbo].[position]  WITH CHECK ADD  CONSTRAINT [FK_position_staffing] FOREIGN KEY([staffing_id])
REFERENCES [dbo].[staffing] ([id])
GO
ALTER TABLE [dbo].[position] CHECK CONSTRAINT [FK_position_staffing]
GO
ALTER TABLE [dbo].[position]  WITH CHECK ADD  CONSTRAINT [FK_position_the_number_of_frames] FOREIGN KEY([the_number_of_frames_id])
REFERENCES [dbo].[the_number_of_frames] ([id])
GO
ALTER TABLE [dbo].[position] CHECK CONSTRAINT [FK_position_the_number_of_frames]
GO
ALTER TABLE [dbo].[rates_fact]  WITH CHECK ADD  CONSTRAINT [FK_rates_fact_position] FOREIGN KEY([position_id])
REFERENCES [dbo].[position] ([id])
GO
ALTER TABLE [dbo].[rates_fact] CHECK CONSTRAINT [FK_rates_fact_position]
GO
ALTER TABLE [dbo].[rates_fact]  WITH CHECK ADD  CONSTRAINT [FK_rates_fact_staff] FOREIGN KEY([staff_id])
REFERENCES [dbo].[staff] ([id])
GO
ALTER TABLE [dbo].[rates_fact] CHECK CONSTRAINT [FK_rates_fact_staff]
GO
ALTER TABLE [dbo].[staff]  WITH CHECK ADD  CONSTRAINT [FK_staff_module] FOREIGN KEY([module_id])
REFERENCES [dbo].[module] ([id])
GO
ALTER TABLE [dbo].[staff] CHECK CONSTRAINT [FK_staff_module]
GO
ALTER TABLE [dbo].[staff]  WITH CHECK ADD  CONSTRAINT [FK_staff_position] FOREIGN KEY([position_id])
REFERENCES [dbo].[position] ([id])
GO
ALTER TABLE [dbo].[staff] CHECK CONSTRAINT [FK_staff_position]
GO
ALTER TABLE [dbo].[the_load_on_the_number_of_visits]  WITH CHECK ADD  CONSTRAINT [FK_the_load_on_the_number_of_visits_position] FOREIGN KEY([position_id])
REFERENCES [dbo].[position] ([id])
GO
ALTER TABLE [dbo].[the_load_on_the_number_of_visits] CHECK CONSTRAINT [FK_the_load_on_the_number_of_visits_position]
GO
ALTER TABLE [dbo].[the_load_on_the_number_of_visits]  WITH CHECK ADD  CONSTRAINT [FK_the_load_on_the_number_of_visits_staff] FOREIGN KEY([staff_id])
REFERENCES [dbo].[staff] ([id])
GO
ALTER TABLE [dbo].[the_load_on_the_number_of_visits] CHECK CONSTRAINT [FK_the_load_on_the_number_of_visits_staff]
GO
ALTER TABLE [dbo].[the_regulations_for_the_operation_LPU]  WITH CHECK ADD  CONSTRAINT [FK_the_regulations_for_the_operation_LPU_value] FOREIGN KEY([value_id])
REFERENCES [dbo].[value] ([id])
GO
ALTER TABLE [dbo].[the_regulations_for_the_operation_LPU] CHECK CONSTRAINT [FK_the_regulations_for_the_operation_LPU_value]
GO
ALTER TABLE [dbo].[the_share_of_visits]  WITH CHECK ADD  CONSTRAINT [FK_the_share_of_visits_date] FOREIGN KEY([date_id])
REFERENCES [dbo].[date] ([id])
GO
ALTER TABLE [dbo].[the_share_of_visits] CHECK CONSTRAINT [FK_the_share_of_visits_date]
GO
ALTER TABLE [dbo].[the_share_of_visits]  WITH CHECK ADD  CONSTRAINT [FK_the_share_of_visits_staff] FOREIGN KEY([staff_id])
REFERENCES [dbo].[staff] ([id])
GO
ALTER TABLE [dbo].[the_share_of_visits] CHECK CONSTRAINT [FK_the_share_of_visits_staff]
GO
ALTER TABLE [dbo].[users]  WITH CHECK ADD  CONSTRAINT [FK_users_department] FOREIGN KEY([department_id])
REFERENCES [dbo].[department] ([id])
GO
ALTER TABLE [dbo].[users] CHECK CONSTRAINT [FK_users_department]
GO
ALTER TABLE [dbo].[value]  WITH CHECK ADD  CONSTRAINT [FK_value_department] FOREIGN KEY([department_id])
REFERENCES [dbo].[department] ([id])
GO
ALTER TABLE [dbo].[value] CHECK CONSTRAINT [FK_value_department]
GO
ALTER TABLE [dbo].[visits_by_type_of_payment]  WITH CHECK ADD  CONSTRAINT [FK_visits_by_type_of_payment_the_share_of_visits] FOREIGN KEY([the_share_of_visits_id])
REFERENCES [dbo].[the_share_of_visits] ([id])
GO
ALTER TABLE [dbo].[visits_by_type_of_payment] CHECK CONSTRAINT [FK_visits_by_type_of_payment_the_share_of_visits]
GO
USE [master]
GO
ALTER DATABASE [1] SET  READ_WRITE 
GO

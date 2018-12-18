AirPassengers
class(AirPassengers)
length(AirPassengers)
install.packages("TTR")
library(TTR)
ss= SMA(AirPassengers,3)
err= AirPassengers-ss
se=err*err
se[is.na(se)]=0
MSE=mean(se)
MSE

king1 = c(34,67,23,45,8,77,12,43,54,92,89,12,65,87,09,1,24,22,77,87,55,87,12,88)
length(king1)
class(king1)
test1=ts(king1)
class(test1)
plot.ts(test1)
s1= SMA(test1,5)
err1=test-s1
se1=err1*err1
se1[is.na(se1)]=0
MSE1=mean(se1)
MSE1


install.packages("e1071")
library(e1071)
?e1071
iris
model=naiveBayes(Species~. , data=iris)
model= naiveBayes(Species~. , data = iris)
sample= data.frame(Sepal.Length=1, Sepal.Width=0, Petal.Length=1, Petal.Width=2)
predict(model,sample)



# install.packages('mlbench')
data(BreastCancer, package="mlbench")
bc <- BreastCancer[complete.cases(BreastCancer), ] # keep complete rows

# remove id column
bc <- bc[,-1]

# convert to numeric
for(i in 1:9) {
  bc[, i] <- as.numeric(as.character(bc[, i]))
}

# Change Y values to 1's and 0's
bc$Class <- ifelse(bc$Class == "malignant", 1, 0)
bc$Class <- factor(bc$Class, levels = c(0, 1))

# Prep Training and Test data.
library(caret)
'%ni%' <- Negate('%in%') # define 'not in' func
options(scipen=999) # prevents printing scientific notations.
set.seed(100)

trainDataIndex <- createDataPartition(bc$Class, p=0.7, list = F)
trainData <- bc[trainDataIndex, ]
testData <- bc[-trainDataIndex, ]

# Class distribution of train data
table(trainData$Class)

# Down Sample
set.seed(100)
down_train <- downSample(x = trainData[, colnames(trainData) %ni% "Class"],
                         y = trainData$Class)
table(down_train$Class)

# Up Sample (optional)
set.seed(100)
up_train <- upSample(x = trainData[, colnames(trainData) %ni% "Class"],
                     y = trainData$Class)
table(up_train$Class)

# Build Logistic Model
logitmod <- glm(Class ~ Cl.thickness + Cell.size + Cell.shape, family = "binomial",
                data=down_train)
summary(logitmod)

pred <- predict(logitmod, newdata = testData, type = "response")
pred

# Recode factors
y_pred_num <- ifelse(pred > 0.5, 1, 0)
y_pred <- factor(y_pred_num, levels=c(0, 1))
y_act <- testData$Class

# Accuracy
mean(y_pred == y_act)



#new logistic

getwd()
mydata = read.csv(file="Resort_Visit.csv")
mydata
visit = mydata$Resort_Visit 
income = mydata$Family_Income
attitude = mydata$Attitude.Towards.Travel
importance = mydata$Importance_Vacation 
size = mydata$House_Size 
age = mydata$Age._Head
visit
income
attitude
importance
size
age
visit = factor(visit)

cor(mydata)
aggregate(income ~visit, FUN = mean) 
aggregate(attitude ~visit, FUN = mean) 
aggregate(importance ~visit, FUN = mean) 
aggregate(size ~visit, FUN = mean)
aggregate(age ~visit, FUN = mean)

boxplot(income ~ visit) 
boxplot(attitude ~ visit)
boxplot(importance ~ visit) 
boxplot(size ~ visit) 
boxplot(age ~ visit)

model = glm(visit ~ income + attitude + importance + size + age, family = binomial(logit))
model
summary(model)

Anova = anova(model,test = 'Chisq')
Anova

predict(model,type = 'response')
residuals(model,type = 'deviance')
predclass = ifelse(predict(model, type ='response')>0.5,"1","0")
predclass

mytable = table(visit, predclass) 
mytable
prop.table(mytable)
